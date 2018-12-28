<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	@include('includes.favicon')
    
    <title>{{ $title ?? 'SAPAB de Prêmios - Login' }}</title>

    @include('admin.includes.styles')

</head>

<body class="login">
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <div class="logo"><img src="{{asset('images/layout/logo.png')}}"/></div>
            <section class="login_content">
				{!! BootForm::open(['url' => url('admin/login'), 'method' => 'post']) !!}
                    
				<h1>Área Restrita</h1>
			
				{!! BootForm::email('email', 'E-mail', old('email'), ['placeholder' => 'Digite o seu e-mail', 'afterInput' => '<span>E-mail</span>'] ) !!}
			
				{!! BootForm::password('password', 'Senha', ['placeholder' => 'Digite a sua senha']) !!}
				
				<div>
					{!! BootForm::submit('Acessar', ['class' => 'btn btn-default submit']) !!}
					<a class="reset_pass" href="{{  url('admin/password/reset') }}">Esqueceu sua senha?</a>
				</div>
                    
				<div class="clearfix"></div>
                    
				<div class="copyright">
					<div>
						@include('includes.copyright')
					</div>
				</div>
				{!! BootForm::close() !!}
            </section>
        </div>
    </div>
</div>
</body>
</html>