@extends('admin.layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Visualização de Ponto Credenciado</h2>
                        <div class="clearfix"></div>
                        <br>
                        <div class="btnsContainer">
                            @php
                                $linkEdit = route('admin.places.edit', ['place' => $place->id]);
                                $linkDelete = route('admin.places.destroy', ['place' => $place->id]);
                                $linkReturn = route('admin.places.index');
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
                                    'url' => route('admin.places.destroy', ['place' => $place->id]),
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
                                <td>{{$place->id}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Ponto</th>
                                <td>{{$place->title}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Endereço</th>
                                <td>{{$place->address}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Localização</th>
                                <td>{{$place->city}} - {{$place->state}}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /page content -->
@endsection