@foreach($lastLotteries as $lastLottery)
<section id="resultados-de-sorteios">
    <div class="container">
        <div class="pesquisar">
            <h2>Pesquisa de Resultados</h2>
            <div class="form-pesquisar">
                <form method="get" action="/pesquisar">
                    <div class="campo-pesquisar">
                        <i class="fa fa-search"></i>
                        <input type="text" placeholder="Digite o número do sorteio" name="number" value="">
                    </div>
                    <button type="submit" class="btn btnPesquisar">Buscar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <h2>Últimos Resultados - Sorteio nº {{ $lastLottery->number }}</h2>
        <p class="dateTime">{{ date('d/m/Y', strtotime($lastLottery->date)) }} às {{ str_replace(":", "h", date('H:i', strtotime($lastLottery->time))) }}</p>

        <div class="resultados">
            @php
            $numbersLottery = explode(',', $lastLottery->results);
            for($n = 1; $n <= 90; $n++){
                if(in_array($n, $numbersLottery)){
                    echo "
                        <div class='numeros selecionado'>
                            $n
                        </div>
                    ";
                }else{
                    echo "
                        <div class='numeros'>
                            $n
                        </div>
                    ";
                }
            }
            @endphp
        </div>
    </div>
</section>

<section id="vencedores">
    <div class="container">
        <h2>Últimos vencedores do sorteio</h2>
        <div class="resultado bg-amarelo">
            <div class="titulo">Kina</div>
            <div class="texto">{{ $lastLottery->place_kina }} - {{ $lastLottery->card_kina }} - R$ {{ number_format($lastLottery->kina, 2, ',', '.') }}</div>
        </div>

        <div class="resultado bg-azul">
            <div class="titulo">Keno</div>
            <div class="texto">{{ $lastLottery->place_keno }} - {{ $lastLottery->card_keno }} - R$ {{ number_format($lastLottery->keno, 2, ',', '.') }}</div>
        </div>
    </div>
</section>
@endforeach

<section id="proximos-sorteios">
    <div class="container">
        <h2 class="txt-branco">Próximos Sorteios</h2>
    </div>

    @php
        $colors = array('etiqueta-azul', 'etiqueta-laranja', 'etiqueta-verde');
        $totalColors = count($colors);
        $colorNumber = 0;
    @endphp

    @foreach($nextLotteries as $nextLottery)
    <div class="sorteio container">
        <div class="row">
            <div class="col colLogo">
                <img src="{{asset('images/layout/sapab-logo-pq.png')}}" alt="Logo SAPAB de Prêmios">
            </div>
            <div class="col-3 colData">
                <div class="titulo">Data</div>
                <div class="texto">
                    @php
                        $date = \Carbon\Carbon::createFromFormat('Y-m-d', $nextLottery->date);
                        echo utf8_encode(strtolower($date->formatLocalized('%d de %B, %A')));
                    @endphp
                </div>
            </div>
            <div class="col colHorario">
                <div class="titulo">Horário</div>
                <div class="texto">{{ str_replace(":", "h", date('H:i', strtotime($nextLottery->time))) }}</div>
            </div>
            <div class="col-4 colPremiacoes">
                <div class="titulo">Premiações</div>
                <div class="texto"><span>Kina R$ {{ number_format($nextLottery->kina, 2, ',', '.') }}</span><span>Keno R$ {{ number_format($nextLottery->keno, 2, ',', '.') }}</span></div>
            </div>
            <div class="col colEtiqueta">
                <div class="etiqueta {{ $colors[$colorNumber] }}">
                    R$ {{ number_format($nextLottery->price, 2, ',', '.') }}
                </div>
                @php
                    if($colorNumber < ($totalColors - 1)){
                        $colorNumber++;
                    }else{
                        $colorNumber = 0;
                    }
                @endphp
            </div>
        </div>
    </div>
    @endforeach

</section>

<section id="duvidas-frequentes">
    <div class="container">
        <h2>Dúvidas Frequentes</h2>

        <div id="accordion">
            @foreach($faqs as $faq)
                <div class="card">
                    <div class="card-header" id="heading{{$faq->id}}">

                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$faq->id}}" aria-expanded="false" aria-controls="collapse{{$faq->id}}">
                                {{$faq->title}}
                            </button>
                        </h5>
                    </div>

                    <div id="collapse{{$faq->id}}" class="collapse" aria-labelledby="heading{{$faq->id}}" data-parent="#accordion">
                        <div class="card-body">
                            <p>{!! $faq->description !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<section id="pontos-credenciados" class="bg-azul">
    <div class="container">
        <h2 class="txt-branco">Pontos Credenciados</h2>
        <div class="subtitulo">Pontos de coleta credenciados pela SAPAB de Prêmios</div>
        @php
            $numOfCols = 3;
            $rowCount = 0;
        @endphp
        <div class="row">
        @foreach($places as $place)
                <div class="col">
                    <div class="ponto">
                        <i class="fa fa-map-marker-alt"></i>
                        <div class="titulo">{{ $place->title }}</div>
                        <div class="localidade">{{ $place->city }} - {{$place->state}}</div>
                    </div>
                </div>
                @php
                    $rowCount++;
                    if($rowCount % $numOfCols == 0)
                    {
                        echo '</div><div class="row">';
                    }
                @endphp
        @endforeach
        </div>
    </div>
</section>

<section id="seja-credenciado">
    <div class="container">
        <h2>Seja um ponto de coleta credenciado</h2>
        <div class="row">
            <div class="col text-center">
                <img src="{{asset('images/layout/credenciados.png')}}" alt="Seja um ponto de coleta credenciado SAPAB de Prêmios">
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <!-- <button type="button" class="btn" data-toggle="modal" data-target="#seja-um-credenciado">Cadastre-se</button> -->
            </div>
        </div>
    </div>
</section>



<div class="modal fade" id="seja-um-credenciado" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Cadastre-se para ser um credenciado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/php/cadastre-se.php">
                    <div class="form-group">
                        <label for="nome" class="col-form-label">Nome:</label>
                        <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite seu nome">
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-form-label">E-mail:</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Digite seu e-mail">
                    </div>

                    <div class="form-group">
                        <label for="telefone" class="col-form-label">Telefone:</label>
                        <input type="text" name="telefone" class="form-control" id="telefone" placeholder="Digite seu telefone">
                    </div>

                    <div class="form-group">
                        <label for="endereco" class="col-form-label">Endereço:</label>
                        <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Digite seu endereço">
                    </div>

                    <div class="form-group">
                        <label for="localidade" class="col-form-label">Localidade:</label>
                        <input type="text" name="localidade" class="form-control" id="localidade" placeholder="Digite sua cidade - estado">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-fechar" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-enviar">Enviar</button>
            </div>
        </div>
    </div>
</div>