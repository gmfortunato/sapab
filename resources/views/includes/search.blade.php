@if(count($searchLotteries) > 0)
@foreach($searchLotteries as $searchLottery)
<section id="resultados-de-sorteios">
    <div class="container">
        <div class="pesquisar">
            <h2>Pesquisa de Resultados</h2>
            @include('includes.form-search')
        </div>
    </div>
    <div class="container">
        <h2>Resultado do Sorteio nº {{ $searchLottery->number }}</h2>
        <p class="dateTime">{{ date('d/m/Y', strtotime($searchLottery->date)) }} às {{ str_replace(":", "h", date('H:i', strtotime($searchLottery->time))) }}</p>

        <div class="resultados">
            @php
            $numbersLottery = $searchLottery->results;
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
            <div class="texto">{{ $searchLottery->placeKina->title }} - {{ $searchLottery->card_kina }} - R$ {{ number_format($searchLottery->kina, 2, ',', '.') }}</div>
        </div>

        <div class="resultado bg-azul">
            <div class="titulo">Keno</div>
            <div class="texto">{{ $searchLottery->placeKeno->title }} - {{ $searchLottery->card_keno }} - R$ {{ number_format($searchLottery->keno, 2, ',', '.') }}</div>
        </div>
    </div>
</section>
@endforeach
@else

    <section id="resultados-de-sorteios">
        <div class="container">
            <div class="pesquisar">
                <h2>Sorteio não encontrado!</h2>
                <p>Desculpe, o número de sorteio pesquisado não existe.</p>
                <a class="btn" href="/" role="button">Voltar ao site</a>
            </div>
        </div>
    </section>

    <section id="resultados-de-sorteios">
        <div class="container">
            <div class="pesquisar">
                <h2>Pesquisa de Resultados</h2>
                @include('includes.form-search')
            </div>
        </div>
    </section>

    <br><br><br>

@endif