@extends('admin.layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->

@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row top_tiles">
            <!-- BOX DASHBOARD CONTENT CONTAINER -->
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-globe"></i></div>
                    <div class="count">{{ $total_visits }}</div>
                    <h3>Total de acessos</h3>
                    <p>Total de visualizações ao website</p>
                </div>
            </div>
            <!-- END BOX DASHBOARD CONTENT CONTAINER -->

            <!-- BOX DASHBOARD CONTENT CONTAINER -->
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-dot-circle-o"></i></div>
                    <div class="count">{{ count($lotteries) }}</div>
                    <h3>Total de Sorteios</h3>
                    <p>Quantidade de sorteios cadastrados</p>
                </div>
            </div>
            <!-- END BOX DASHBOARD CONTENT CONTAINER -->

            <!-- BOX DASHBOARD CONTENT CONTAINER -->
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-money"></i></div>
                    <div class="count">{{ count($pastLotteries) }}</div>
                    <h3>Sorteios realizados</h3>
                    <p>Quantidade de sorteios já realizados</p>
                </div>
            </div>
            <!-- END BOX DASHBOARD CONTENT CONTAINER -->

            <!-- BOX DASHBOARD CONTENT CONTAINER -->
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-map-marker"></i></div>
                    <div class="count">{{ count($places) }}</div>
                    <h3>Pontos Credenciados</h3>
                    <p>Total de pontos credenciados cadastrados</p>
                </div>
            </div>
            <!-- END BOX DASHBOARD CONTENT CONTAINER -->
        </div>

        <div class="row">

            <!-- GRAPHIC CONTENT CONTAINER
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Total de Acessos <small>(website)</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content2">
                         <div id="visitschart" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
            <!-- END GRAPHIC CONTENT CONTAINER -->

            <!-- DASHBOARD CONTENT CONTAINER -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Últimos acessos <small>(últimos 7 dias)</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li>
                                <a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-striped table-hover">
                            <thead>
                            @if(count($lastVisits) > 0)
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Última visita</th>
                                </tr>
                            @else
                                <tr>
                                    Nenhuma visita nos últimos 7 dias.
                                </tr>
                            @endif
                            </thead>
                            <tbody>

                            @if(count($lastVisits) > 0)
                                @foreach($lastVisits as $lastVisit)
                                    <tr>
                                        <th scope="row">{{ $lastVisit->name }}</th>
                                        <td>{{ $lastVisit->email }}</td>
                                        <td>{{ date('d/m/Y', strtotime($lastVisit->last_visit)) }}</td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!-- END DASHBOARD CONTENT CONTAINER -->

            <!-- DASHBOARD CONTENT CONTAINER -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Total de acessos por dia <small>(últimos 5 dias)</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li>
                                <a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-striped table-hover">
                            <thead>
                            @if(count($totalVisitors) > 0)
                                <tr>
                                    <th>Data</th>
                                    <th style="text-align: center;">Total de acessos</th>
                                </tr>
                            @else
                                <tr>
                                    Nenhuma visita nos últimos dias.
                                </tr>
                            @endif
                            </thead>
                            <tbody>

                            @if(count($totalVisitors) > 0)
                                @foreach($totalVisitors as $totalVisitor)
                                    <tr>
                                        <th scope="row">{{ date('d/m/Y', strtotime($totalVisitor->date)) }}</th>
                                        <td align="center">{{ $totalVisitor->total_visits }}</td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!-- END DASHBOARD CONTENT CONTAINER -->

            <!-- DASHBOARD CONTENT CONTAINER -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Próximos Sorteios <small>(máximo de 7 dias: {{ date('d/m/Y', strtotime('now +7 days')) }})</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li>
                                <a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-striped table-hover">
                            <thead>
                            @if(count($nextLotteries) > 0)
                                <tr>
                                    <th>Sorteio</th>
                                    <th>Data</th>
                                    <th>Hora</th>
                                </tr>
                            @else
                                <tr>
                                    Nenhum sorteio cadastrado para os próximos 7 dias.
                                </tr>
                            @endif
                            </thead>
                            <tbody>

                            @if(count($nextLotteries) > 0)
                                @foreach($nextLotteries as $nextLottery)
                                    <tr>
                                        <th scope="row">{{ $nextLottery->number }}</th>
                                        <td>{{ date('d/m/Y', strtotime($nextLottery->date)) }}</td>
                                        <td>{{ str_replace(':', 'h', date('H:i', strtotime($nextLottery->time))) }}</td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!-- END DASHBOARD CONTENT CONTAINER -->

            <!-- DASHBOARD CONTENT CONTAINER -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Últimos pontos credenciados cadastrados </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li>
                                <a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-striped table-hover">
                            <thead>
                            @if(count($places) > 0)
                            <tr>
                                <th>Nome</th>
                                <th>Cidade</th>
                                <th>Cadastrado em</th>
                            </tr>
                            @else
                                <tr>
                                    Nenhum ponto credenciado cadastrado.
                                </tr>
                            @endif
                            </thead>
                            <tbody>

                            @if(count($places) > 0)
                                @php
                                    $maxPlaces = 0;
                                @endphp
                                @foreach($places as $place)
                                    @if($maxPlaces < 5)
                                        <tr>
                                            <th scope="row">{{ $place->title }}</th>
                                            <td>{{ $place->city . '-' . $place->state }}</td>
                                            <td>{{ date('d/m/Y', strtotime($place->created_at)) }}</td>
                                        </tr>
                                        @php $maxPlaces++; @endphp
                                    @else
                                        @php break; @endphp
                                    @endif
                                @endforeach
                            @endif

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!-- END DASHBOARD CONTENT CONTAINER -->

        </div>
    </div>
    <!-- /page content -->
@endsection

@push('scripts')

<script>
    $(document).ready(function(){
        $('.money').mask('000.000.000.000.000,00', {reverse: true});
    });
</script>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script>
    new Morris.Line({

        element: 'visitschart',

        data: [
            { m: '01', a: 100, b: 90 },
            { m: '02', a: 75,  b: 65 },
            { m: '03', a: 50,  b: 40 },
            { m: '04', a: 75,  b: 65 },
            { m: '05', a: 50,  b: 40 },
            { m: '06', a: 75,  b: 65 },
            { m: '07', a: 100, b: 90 }
        ],
        xkey: 'm',
        ykeys: ['a', 'b'],
        labels: ['Mês Atual', 'Mês Anterior']
    });
</script>

@endpush

