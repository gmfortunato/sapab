@extends('admin.layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Gerenciamento de usuários</h3>
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
                                <h2>Listagem de Usuários</h2>
                                <ul class="nav navbar-right">
                                    <a href="{{ url('admin/users/create') }}" class="btn btn-success">Cadastrar</a>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="row">

                                    <form method="GET" action="admin/users" accept-charset="UTF-8">

                                        <div class="form-group">
                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                <label for="name" class="control-label">Nome</label>:
                                                <input class="form-control" name="name" type="text" id="name">
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                <label for="email" class="control-label">E-mail</label>:
                                                <input class="form-control" name="email" type="email" id="email">
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                <input class="btn btn-success btn-filter-align" type="submit" value="Filtrar">
                                            </div>
                                        </div>

                                    </form>
                                </div>

                                <div class="paginationBlock">
                                    {!! $users->links() !!}
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>E-mail</th>
                                                <th>Último acesso</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr style="cursor: pointer;" onclick="javascript:location.href='{{ route('admin.users.show', ['user' => $user->id])}}'">
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ date('d/m/Y', strtotime($user->last_visit)) }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary" href="{{ route('admin.users.edit', ['user' => $user->id]) }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger" href="{{ "users/$user->id/delete" }}">
                                                        <i class="fa fa-remove"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="paginationBlock">
                                    {!! $users->links() !!}
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