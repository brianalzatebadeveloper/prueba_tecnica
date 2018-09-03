@extends('layouts.error')

@section('title','Error 403')

@section('content')

<div class="content_pages_error"></div>

<section class="error_content">
	<div class="title_error">
		<h2>Error <strong>403</strong></h2>
		<h3>Acceso Restringido</h3>
		<p>Señor(a) Usuario(a) usted no esta autorizado para ingresar a esta sección de la página web.</p>
	</div>
	<div class="button_error">
		<a href="{{ route('page.home') }}">Regresar a la Página</a>
	</div>
</section>

@endsection