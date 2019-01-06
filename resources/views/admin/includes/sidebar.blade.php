<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('admin/dashboard') }}" class="site_title"><img src="{{asset('images/layout/icone.png')}}" alt="Ícone SAPAB"> <span>SAPAB</span></a>
        </div>
        
        <div class="clearfix"></div>

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Menu principal</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i> Dashboard </a></li>
                    <li><a href="{{ url('admin/users') }}"><i class="fa fa-users"></i> Usuários </a></li>
                    <li><a><i class="fa fa-repeat"></i> Sorteios <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('admin/lotteries') }}">Listagem de Sorteios</a></li>
                            <li><a href="{{ url('admin/lotteries/winners') }}">Vencedores</a></li>
                            <li><a href="{{ url('admin/lotteries/results') }}">Resultados</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('admin/faqs') }}"><i class="fa fa-question"></i> Dúvidas Frequentes </a></li>
                    <li><a href="{{ url('admin/places') }}"><i class="fa fa-map-marker"></i> Pontos Credenciados </a></li>
                    <li><a href="{{ url('/') }}"><i class="fa fa-undo"></i> Voltar ao Website </a></li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Dashboard" href="{{ url('admin/dashboard') }}">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Minha Conta" href="{{ url('admin/myAccount') }}">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Configurações" href="{{ url('admin/configurations') }}">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('admin/logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>