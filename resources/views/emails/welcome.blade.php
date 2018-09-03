@extends('layouts.email')

@section('title','Mensaje de Bienvenida')

@section('content')

 <div style="width: 90%; height: auto; position: relative; display: block; margin: 0 auto;text-align:center;">
	<h2 style="color:#ffc814; font-size:1.5em;margin: 0px;">Hola, {{ $contact->name }}! Bienvenido(a)<br> </h2>
	<p style="color:#333; font-weight: 300; margin: 0px; font-size: 1.2em;">BADeveloper - Brian Alzate Desarrollador<br> le agradece por visitar y escribir en su sitio web.</p>


	<p style="color:#bcbfbf; font-weight: bold; margin: 0px; margin-top: 2em; font-size: 1.2em;">Pronto me pondré en contacto contigo </p>

	<div style="width: 90%; height: auto; position: relative; display: block; margin: 0 auto; text-align: center;">
		<a href="{{ route('page.home') }}" style="margin-top: 2em;border: none;padding: .5em 2em;color: #fff;background-color: #ffc814;font-family: 'Raleway', sans-serif;font-weight: 500;font-size: 1em;cursor: pointer;text-decoration: none;display: inline-block;">Ir a la página</a>
	</div>
</div>

@endsection
