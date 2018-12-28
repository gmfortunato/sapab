<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @include('includes.favicon')

        <title>{{ $title ?? 'SAPAB de Prêmios - Área Restrita' }}</title>

        @include('admin.includes.styles')

        @stack('stylesheets')

        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=mycs5noymvjnr9hdsn4tpsi5x2gf0r9x9639vlwk2bw2370q"></script>

    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">

                @include('admin.includes.sidebar')

                @include('admin.includes/topbar')

                @yield('main_container')

                @include('admin.includes/footer')

            </div>
        </div>

        <!-- jQuery -->
        <script src="{{ asset("js/jquery.min.js") }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset("js/bootstrap.min.js") }}"></script>
        <!-- Custom Theme Scripts -->
        <script src="{{ asset("js/gentelella.min.js") }}"></script>

        @stack('scripts')

    </body>
</html>