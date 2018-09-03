@extends('layouts.email')

@section('title','Contacto')


@section('content')

<div style="width: 90%; height: auto; position: relative; display: block; margin: 0 auto;">
    <h2 style="color:#ffc814; font-size:1.5em;margin: 0px;text-align:center;" >Hola,  Sr Administrador!  </h2>
    <p style="color:#333; font-weight: 300; margin: 0px; font-size: 1.2em; text-align:center;">Se le informa que ha sido enviado  <br> un mensaje de contácto através <br> de su página web.</p>


    <p style="color:#bcbfbf; font-weight: bold; margin: 0px;  margin-top: 2.5em;padding-left:2.5em; padding-right: 2em; font-size: 1.2em;">Nombre: <strong style="color: #333;font-weight: 300;text-align: left;">{{ $contact->name }}</strong><br>
    Email: <strong style="color: #333;font-weight: 300;">{{ $contact->email }}</strong><br>
@if(!empty($contact->phone))
    Teléfono o Celular: <strong style="color: #333;font-weight: 300;">{{ $contact->phone }}</strong><br>
@endif
@if(!empty($contact->city))
    Ciudad: <strong style="color: #333;font-weight: 300;">{{ $contact->city }}</strong><br>
@endif
    Enviado desde: <strong style="color: #333;font-weight: 300;">{{ $contact->section }}</strong><br>
    Mensaje: <strong style="color: #333;font-weight: 300;">{{ $contact->message }}</strong><br></p>

@if(!empty($plan))
 <p style="color:#333; font-weight: 500; margin: 0px;  margin-top: 1em; padding-left:2.5em; padding-right: 2.5em; font-size: 1.2em;text-align:center;">
 	  El contacto está interesado en el plan {{ $plan->name }}.
 </p>
@endif


</div>

@endsection
