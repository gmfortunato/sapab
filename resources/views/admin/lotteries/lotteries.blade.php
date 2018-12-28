@extends('admin.layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Gerenciamento de Sorteios</h3>
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
                                <h2>Listagem de Sorteios</h2>
                                <ul class="nav navbar-right">
                                    <a href="{{ url('admin/lotteries/create') }}" class="btn btn-success">Cadastrar</a>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="row">

                                    <!-- FORMULÁRIO DE PESQUISA -->

                                </div>

                                <div class="paginationBlock">
                                    {!! $lotteries->links() !!}
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th class="text-center">Data</th>
                                                <th class="text-center">Horário</th>
                                                <th class="text-center">Número do sorteio</th>
                                                <th class="text-center">Premiações - Kina</th>
                                                <th class="text-center">Premiações - Keno</th>
                                                <th class="text-center">Valor do Cupom</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($lotteries as $lottery)
                                            <tr style="cursor: pointer;" onclick="javascript:location.href='{{ route('admin.lotteries.show', ['faq' => $lottery->id])}}'">
                                                <td>{{ $lottery->id }}</td>
                                                <td class="text-center">{{ date('d/m/Y', strtotime($lottery->date)) }}</td>
                                                <td class="text-center">{{ date('H:i', strtotime($lottery->time)) }}</td>
                                                <td class="text-center">{{ $lottery->number }}</td>
                                                <td class="text-center">R$ {{ number_format($lottery->kina, 2, ',', '.') }}</td>
                                                <td class="text-center">R$ {{ number_format($lottery->keno, 2, ',', '.') }}</td>
                                                <td class="text-center">R$ {{ number_format($lottery->price, 2, ',', '.') }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary" href="{{ route('admin.lotteries.edit', ['faq' => $lottery->id]) }}">Editar</a>
                                                    <a class="btn btn-danger">Excluir</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="paginationBlock">
                                    {!! $lotteries->links() !!}
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