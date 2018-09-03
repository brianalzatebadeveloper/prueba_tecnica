@extends('layouts.error')

@section('title','Error 500')

@section('content')

<div class="content_pages_error"></div>

<section class="error_content">
	<div class="title_error">
		<h2>Error <strong>500</strong></h2>
		<h3>Error interno del servidor</h3>
		<p>Ups, algo salio mal en el servidor. Por favor, intente nuevamente.</p>
	</div>
	<div class="button_error">
		<a href="{{ route('page.home') }}">Regresar a la Página</a>
	</div>
</section>

@endsection