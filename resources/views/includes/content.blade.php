<section id="resultados-de-sorteios">
    <div class="container">
        <h2>Pesquisa de resultados</h2>

        <div class="pesquisar">

        </div>

        <div class="resultados">
            @for($n = 1; $n <= 50; $n++)
                @if($n == 4 || $n == 16 || $n == 24 || $n == 30 || $n == 40)
                    <div class="numeros selecionado">
                        {{ $n }}
                    </div>
                @else
                    <div class="numeros">
                        {{ $n }}
                    </div>
                @endif
            @endfor
        </div>
    </div>
</section>

<section id="vencedores">
    <div class="container">
        <h2>Últimos vencedores do sorteio</h2>
        <div class="resultado bg-amarelo">
            <div class="titulo">Quina</div>
            <div class="texto">ROXINHO - 328871985 - R$ 50,00</div>
        </div>

        <div class="resultado bg-azul">
            <div class="titulo">Queno</div>
            <div class="texto">LEDNAN - 328871985 - R$ 100,00</div>
        </div>
    </div>
</section>

<section id="proximos-sorteios">
    <div class="container">
        <h2 class="txt-branco">Próximos Sorteios</h2>
    </div>

    <div class="sorteio container">
        <div class="row">
            <div class="col colLogo">
                <img src="{{asset('images/layout/sapab-logo-pq.png')}}" alt="Logo SAPAB de Prêmios">
            </div>
            <div class="col-3 colData">
                <div class="titulo">Data</div>
                <div class="texto">01 de janeiro, Segunda-feira</div>
            </div>
            <div class="col colHorario">
                <div class="titulo">Horário</div>
                <div class="texto">17h30</div>
            </div>
            <div class="col-4 colPremiacoes">
                <div class="titulo">Premiações</div>
                <div class="texto">Quinta R$ 60,00 - Queno R$ 600,00</div>
            </div>
            <div class="col colEtiqueta">
                <div class="etiqueta etiqueta-laranja">
                    R$ 2,50
                </div>
            </div>
        </div>
    </div>

    <div class="sorteio container">
        <div class="row">
            <div class="col colLogo">
                <img src="{{asset('images/layout/sapab-logo-pq.png')}}" alt="Logo SAPAB de Prêmios">
            </div>
            <div class="col-3 colData">
                <div class="titulo">Data</div>
                <div class="texto">03 de janeiro, Quarta-feira</div>
            </div>
            <div class="col colHorario">
                <div class="titulo">Horário</div>
                <div class="texto">17h00</div>
            </div>
            <div class="col-4 colPremiacoes">
                <div class="titulo">Premiações</div>
                <div class="texto">Quinta R$ 100,00 - Queno R$ 1000,00</div>
            </div>
            <div class="col colEtiqueta">
                <div class="etiqueta etiqueta-azul">
                    R$ 3,50
                </div>
            </div>
        </div>
    </div>

    <div class="sorteio container">
        <div class="row">
            <div class="col colLogo">
                <img src="{{asset('images/layout/sapab-logo-pq.png')}}" alt="Logo SAPAB de Prêmios">
            </div>
            <div class="col-3 colData">
                <div class="titulo">Data</div>
                <div class="texto">03 de janeiro, Quarta-feira</div>
            </div>
            <div class="col colHorario">
                <div class="titulo">Horário</div>
                <div class="texto">17h00</div>
            </div>
            <div class="col-4 colPremiacoes">
                <div class="titulo">Premiações</div>
                <div class="texto">Quinta R$ 100,00 - Queno R$ 1000,00</div>
            </div>
            <div class="col colEtiqueta">
                <div class="etiqueta etiqueta-azul">
                    R$ 3,50
                </div>
            </div>
        </div>
    </div>

    <div class="sorteio container">
        <div class="row">
            <div class="col colLogo">
                <img src="{{asset('images/layout/sapab-logo-pq.png')}}" alt="Logo SAPAB de Prêmios">
            </div>
            <div class="col-3 colData">
                <div class="titulo">Data</div>
                <div class="texto">03 de janeiro, Quarta-feira</div>
            </div>
            <div class="col colHorario">
                <div class="titulo">Horário</div>
                <div class="texto">17h00</div>
            </div>
            <div class="col-4 colPremiacoes">
                <div class="titulo">Premiações</div>
                <div class="texto">Quinta R$ 100,00 - Queno R$ 1000,00</div>
            </div>
            <div class="col colEtiqueta">
                <div class="etiqueta etiqueta-azul">
                    R$ 3,50
                </div>
            </div>
        </div>
    </div>

    <div class="sorteio container">
        <div class="row">
            <div class="col colLogo">
                <img src="{{asset('images/layout/sapab-logo-pq.png')}}" alt="Logo SAPAB de Prêmios">
            </div>
            <div class="col-3 colData">
                <div class="titulo">Data</div>
                <div class="texto">03 de janeiro, Quarta-feira</div>
            </div>
            <div class="col colHorario">
                <div class="titulo">Horário</div>
                <div class="texto">17h00</div>
            </div>
            <div class="col-4 colPremiacoes">
                <div class="titulo">Premiações</div>
                <div class="texto">Quinta R$ 100,00 - Queno R$ 1000,00</div>
            </div>
            <div class="col colEtiqueta">
                <div class="etiqueta etiqueta-azul">
                    R$ 3,50
                </div>
            </div>
        </div>
    </div>

</section>

<section id="duvidas-frequentes">
    <div class="container">
        <h2>Dúvidas Frequentes</h2>

        <div id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            O que é a SAPAB de Prêmios?
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Para onde vão os recursos adquiridos pela SAPAB de Prêmios?
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Como participo dos sorteios?
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingFour">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Quais são as modalidades de prêmios e promoções?
                        </button>
                    </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingFive">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Como fico sabendo dos resultados de cada sorteio?
                        </button>
                    </h5>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<section id="pontos-credenciados" class="bg-azul">
    <div class="container">
        <h2 class="txt-branco">Pontos Credenciados</h2>
        <div class="subtitulo">Pontos de coleta credenciados pela SAPAB de Prêmios</div>
        @for($n = 0; $n < 5; $n++)
        <div class="row">
            @for($i = 0; $i < 3; $i++)
            <div class="col">
                <div class="ponto">
                    <i class="fa fa-map-marker-alt"></i>
                    <div class="titulo">Bar Parada Obrigatória</div>
                    <div class="endereco">Rua de exemplo, 1000</div>
                    <div class="localidade">Bauru - SP</div>
                </div>
            </div>
            @endfor
        </div>
        @endfor
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
                <button type="button" class="btn" data-toggle="modal" data-target="#seja-um-credenciado">Cadastre-se</button>
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