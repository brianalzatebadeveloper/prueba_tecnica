@extends('layouts.error')

@section('title','Error 404')

@section('content')

<div class="content_pages_error"></div>

<section class="error_content">
	<div class="title_error">
		<h2>Error <strong>404</strong></h2>
		<h3>Página no encontrada</h3>
		<p>Lo sentimos, pero la pagina que busca no existe o no fue encontrada...</p>
	</div>
	<div class="button_error">
		<a href="{{ route('page.home') }}">Regresar a la Página</a>
	</div>
</section>

@endsection