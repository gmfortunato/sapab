@extends('admin.layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Gerenciamento de Pontos Credenciados</h3>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right">
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="content-message">
                        @if(Session::has('success'))
                            <div class="container">
                                {!! Alert::success(Session::get('success'))->close()  !!}
                            </div>
                        @elseif(Session::has('error'))
                            <div class="container">
                                {!! Alert::danger(Session::get('error'))->close() !!}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Listagem de Pontos Credenciados</h2>
                                <ul class="nav navbar-right">
                                    <a href="{{ url('admin/places/create') }}" class="btn btn-success">Cadastrar</a>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="row">

                                    <!-- FORMULÁRIO DE PESQUISA -->

                                </div>

                                <div class="paginationBlock">
                                    {!! $places->links() !!}
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th class="col-">Ponto</th>
                                                <th>Endereço</th>
                                                <th>Localização</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($places as $place)
                                            <tr style="cursor: pointer;" onclick="javascript:location.href='{{ route('admin.places.show', ['place' => $place->id])}}'">
                                                <td>{{ $place->id }}</td>
                                                <td>{{ $place->title }}</td>
                                                <td>{{ $place->address }}</td>
                                                <td>{{ $place->city }} - {{ $place->state }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary" href="{{ route('admin.places.edit', ['place' => $place->id]) }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger" href="{{ "places/$place->id/delete" }}">
                                                        <i class="fa fa-remove"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="paginationBlock">
                                    {!! $places->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /page content -->
@endsection