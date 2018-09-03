<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Administrador - {{ config('app.name', 'Laravel') }} </title>
    <link rel="stylesheet" href="{{ asset('css/mng/login.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
  <style>
  	.front-error-login{
  	width: 100%;
    display: block;
    text-align: center;
    min-height: 50px;
    color:#c51b1b;
  	}
  	.front-error-login p{
     line-height: 50px;
  	}
    .content_message{
      top: 0;
      width: 90%;
      height: auto;
      text-align: center;
      margin: 0 auto;
      position: relative;

    }
  </style>
<div class="bar-head">
	<a href="{{ url('/') }}" title=""><<< Volver a   {{ config('app.name', 'Laravel') }}</a>
</div>
<img src="{{ asset('img/logo.png') }}" class="logo" alt="">
<div class="content_message">

@include('elements.error.error')

@include('flash::message')

</div>
<div id="login">

{!! Form::open(['route' => 'login.submit', 'method' => 'post']) !!}

  <div class="form-group">
     {!! Form::email('email', null, ['placeholder' => 'Usuario','required']) !!}
  </div> 

  <div class="form-group">
     {!! Form::password('password', ['placeholder' => 'Contraseña','required']) !!}
  </div> 

  <div class="form-group">
     {!! Form::submit('Ingresar', ['class' => 'btn']) !!}
  </div> 

{!! Form::close() !!}
  
</div>

<div class="bar-footer"></div>
 </body>
</html>
