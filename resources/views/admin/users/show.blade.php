@extends('admin.layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Visualização de "{{$user->name}}"</h2>
                        <div class="clearfix"></div>
                        <br>
                        <div class="btnsContainer">
                            @php
                                $linkEdit = route('admin.users.edit', ['user' => $user->id]);
                                $linkDelete = route('admin.users.destroy', ['user' => $user->id]);
                                $linkReturn = route('admin.users.index');
                            @endphp
                            {!! Button::primary('Editar')->asLinkTo($linkEdit) !!}
                            {!!
                                Button::danger('Excluir')->asLinkTo($linkDelete)
                                ->addAttributes([
                                    'onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"
                                ]);
                            !!}
                            {!!
                                Button::withValue('Voltar')->asLinkTo($linkReturn);
                            !!}
                            @php
                                $formDelete = FormBuilder::plain([
                                    'id' => 'form-delete',
                                    'url' => route('admin.users.destroy', ['user' => $user->id]),
                                    'method' => 'DELETE',
                                    'style' => 'display: none'
                                ])
                            @endphp
                            {!! form($formDelete) !!}
                        </div>
                        <br>
                    </div>
                    <div class="x_content">

                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th scope="row">ID</th>
                                <td>{{$user->id}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nome</th>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">E-mail</th>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Último acesso</th>
                                <td>
                                    @if($user->last_visit != '0000-00-00')
                                        {{ date('d/m/Y', strtotime($user->last_visit)) }}
                                    @else
                                        <span class="red">Nunca acessou</span>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /page content -->
@endsection