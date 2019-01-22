@extends('admin.layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Visualização do sorteio nº {{ $lottery->number }}</h2>
                        <div class="clearfix"></div>
                        <br>
                        <div class="btnsContainer">
                            @php
                                $linkEdit = route('admin.lotteries.edit', ['faq' => $lottery->id]);
                                $linkDelete = route('admin.lotteries.destroy', ['faq' => $lottery->id]);
                                $linkReturn = route('admin.lotteries.index');
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
                                    'url' => route('admin.lotteries.destroy', ['faq' => $lottery->id]),
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
                                <th scope="row" class="col-sm-4 col-md-3 col-lg-2">ID</th>
                                <td>{{$lottery->id}}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="col-sm-4 col-md-3 col-lg-2">Número</th>
                                <td>{{ $lottery->number }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="col-sm-4 col-md-3 col-lg-2">Data</th>
                                <td>{{ date('d/m/Y', strtotime($lottery->date)) }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="col-sm-4 col-md-3 col-lg-2">Hora</th>
                                <td>{{ str_replace(':', 'h', date('H:i', strtotime($lottery->time))) }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="col-sm-4 col-md-3 col-lg-2">Premiação - Kina</th>
                                <td>R$ {{ number_format($lottery->kina, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="col-sm-4 col-md-3 col-lg-2">Premiação - Keno</th>
                                <td>R$ {{ number_format($lottery->keno, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="col-sm-4 col-md-3 col-lg-2">Valor do cupom</th>
                                <td>R$ {{ number_format($lottery->price, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="col-sm-4 col-md-3 col-lg-2">Ponto Credenciado - Kina</th>
                                <td>
                                    @if(!empty($lottery->placeKina->title))
                                        {{$lottery->placeKina->title}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="col-sm-4 col-md-3 col-lg-2">Cupom Premiado - Kina</th>
                                <td>
                                    @if(!empty($lottery->card_kina))
                                        {{$lottery->card_kina}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="col-sm-4 col-md-3 col-lg-2">Ponto Credenciado - Keno</th>
                                <td>
                                    @if(!empty($lottery->placeKeno->title))
                                        {{$lottery->placeKeno->title}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="col-sm-4 col-md-3 col-lg-2">Cupom Premiado - Keno</th>
                                <td>
                                    @if(!empty($lottery->card_keno))
                                        {{$lottery->card_keno}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="col-sm-4 col-md-3 col-lg-2">Números Sorteados</th>
                                <td>
                                    @if(isset($lottery->results))
                                     {{ implode(', ', $lottery->results) }}
                                    @endif
                                </td>
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

