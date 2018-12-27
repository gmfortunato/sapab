<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('includes.favicon')

    <title>{{ $title ?? 'SAPAB de Prêmios - Senha' }}</title>

    @include('admin.includes.styles')

</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
    
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
					{!! BootForm::open(['url' => url('/password/reset'), 'method' => 'post']) !!}
                    <h1>Reset Password</h1>
                    
                    {!! BootForm::hidden('token', $token) !!}
	
					{!! BootForm::email('email', 'E-mail', old('email'), ['placeholder' => 'Digite seu e-mail']) !!}
	
					{!! BootForm::password('password', 'Senha', ['placeholder' => 'Senha']) !!}
	
					{!! BootForm::password('password_confirmation', 'Confirmação de senha', ['placeholder' => 'Confirme sua senha']) !!}
	
					{!! BootForm::submit('Enviar', ['class' => 'btn btn-default col-md-9']) !!}
	
					<div class="clearfix"></div>
					
                    <div class="separator">
                        <p class="change_link">Já possui cadastro?
                            <a href="{{ url('/login') }}" class="to_register"> Entrar </a>
                        </p>
                        
                        <div class="clearfix"></div>
                        <br />
                    </div>

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