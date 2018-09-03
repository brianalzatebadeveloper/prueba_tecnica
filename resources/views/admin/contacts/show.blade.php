@extends('layouts.admin')

@section('title','Ampliación de Contacto')

@section('content')

<div class="">
            <div class="page-title">

                <div class="pull-left">
                    <h3>Ampliación de Contacto</h3>
                </div>
                <div class="pull-right">
                <a href="{{ route('contacts.index') }}" class="btn btn-app"><i class="fa fa-repeat"></i> Volver a Contactos</a>
                </div>

          </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <div class="col-md-12">
                      <p><strong>Nombre:</strong> {{ $contact->name }}</p>
                      <p><strong>E-mail:</strong> {{ $contact->email }}</p>
                      <p><strong>Teléfono o Celular:</strong> {{ $contact->phone }}</p>
                      <p><strong>Ciudad:</strong> {{ $contact->city }}</p>
                    @if(!empty($contact->plan_id))
                      <p><strong>url:</strong> {{ $contact->url }}</p>
                      <p><strong>url2:</strong> {{ $contact->url2 }}</p>
                      <p><strong>Descripción Proyecto:</strong> {{ $contact->message }}</p>
                    @else
                      <p><strong>Mensaje:</strong> {{ $contact->message }}</p>
                      <p><strong>Enviado:</strong> {{ $contact->created_at->diffForHumans() }}</p>
                    @endif
                    </div>



                  </div>
                </div>
              </div>
            </div>
          </div>

{!! Form::open(['route' => 'contacts.status', 'method' => 'POST', 'id' => 'formStatus']) !!}
{!! Form::close() !!}

@endsection


@section('customJs')

<script>

  var urlBase = "{{ route('contacts.status') }}";
  var token = $('#formStatus :input[name=_token]').val();
  var idContact = "{{ $contact->id }}";

  // console.log(urlBase);
  // console.log(token);

  $(function(){

    $.ajax({

        url: urlBase,
        type: 'POST',
        dataType: 'json',
        async: false,
        data: {_token:token, id:idContact},
        success: function(response){

          console.log(response.ok);

          refreshMembers();

        }

    });

  });
</script>

@endsection
