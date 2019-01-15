
@foreach($searchLotteries as $searchLottery)
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
        <h2>Resultado do Sorteio nº {{ $searchLottery->number }}</h2>
        <p class="dateTime">{{ date('d/m/Y', strtotime($searchLottery->date)) }} às {{ str_replace(":", "h", date('H:i', strtotime($searchLottery->time))) }}</p>

        <div class="resultados">
            @php
            $numbersLottery = explode(',', $searchLottery->results);
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
            <div class="texto">{{ $searchLottery->place_kina }} - {{ $searchLottery->card_kina }} - R$ {{ number_format($searchLottery->kina, 2, ',', '.') }}</div>
        </div>

        <div class="resultado bg-azul">
            <div class="titulo">Keno</div>
            <div class="texto">{{ $searchLottery->place_keno }} - {{ $searchLottery->card_keno }} - R$ {{ number_format($searchLottery->keno, 2, ',', '.') }}</div>
        </div>
    </div>
</section>
@endforeach

