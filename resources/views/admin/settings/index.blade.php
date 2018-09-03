@extends('layouts.admin')

@section('title','Configuraciones')

@section('content')

<div class="">
            <div class="page-title">

                <div class="pull-left">
                    <h3>Configuraciones</h3>
                </div>




            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />


			{!! Form::open(['route' => ['settings.update',$setting->id],'method' => 'PUT']) !!}

                        <div class="form-group">

	                        {!! Form::label('facebook','Facebook') !!}
	                        {!! Form::text('facebook', $setting->facebook, ['class' => 'form-control', 'required']) !!}

                        </div>
                         <div class="form-group">

                         	{!! Form::label('twitter','Twitter') !!}
	                        {!! Form::text('twitter', $setting->twitter, ['class' => 'form-control', 'required']) !!}

                        </div>
                         <div class="form-group">

							            {!! Form::label('instagram','Instagram') !!}
	                        {!! Form::text('instagram', $setting->instagram, ['class' => 'form-control', 'required']) !!}

                        </div>

                        <div class="form-group">

                        	{!! Form::label('googleplus','Google +') !!}
	                        {!! Form::text('googleplus', $setting->googleplus, ['class' => 'form-control', 'required']) !!}

                        </div>


                        <div class="form-group">

                            {!! Form::label('contact_email','Correo de contacto') !!}
	                        {!! Form::text('contact_email', $setting->contact_email, ['class' => 'form-control', 'required']) !!}

                        </div>

                        <div class="form-group">

                          {!! Form::label('cellphone','Whatsapp') !!}
                          {!! Form::text('cellphone', $setting->cellphone, ['class' => 'form-control']) !!}

                        </div>
                        
                         <div class="form-group">

                         	{!! Form::label('key_map','API Google Maps') !!}
	                        {!! Form::text('key_map', $setting->key_map, ['class' => 'form-control', 'required']) !!}

                        </div>
                            <h4>Coordenadas</h4>

                             <div class="form-group row">

                               <div class="col-md-4">

                                {!! Form::label('latitude','Latitud') !!}
	                        	{!! Form::text('latitude', $setting->latitude, ['class' => 'form-control', 'required', 'id' => 'txtLat']) !!}

                               </div>
                               <div class="col-md-4">

                               	{!! Form::label('longitude','Longitud') !!}
	                        	{!! Form::text('longitude', $setting->longitude, ['class' => 'form-control', 'required', 'id' => 'txtLong']) !!}

                               </div>
                               <div class="col-md-4">
                               <button id="btnUpdateMap" class="btn btn-info" style="margin-top:25px;">Aplicar</button>
                               </div>

                            </div>

                            <div class="row">
                                <div class=" col-xs-12 col-lg-12">
                                      <div id="map" style="width: 100%; height: 400px"></div>
                                </div>
                          </div>

                            <div class="form-group" style=" padding-top: 2em; padding-bottom: 2em;">

                        	{!! Form::submit('Guardar',['class' => 'btn btn-success']) !!}
                        	<a href="{{ route('settings.index') }}" class="btn btn-danger">Cancelar</a>


                            </div>




                    {!! Form::close() !!}

                  </div>
                </div>
              </div>
            </div>
          </div>


@endsection

@section('customJs')
<script src="{{ $setting->key_map }}"></script>
<script type="text/javascript">
   var map;
   var marker;
   var dataLat = "{{ $setting->latitude }}";
   var dataLng = "{{ $setting->longitude }}";
   // var geocoder = new google.maps.Geocoder();

   // function geocodePosition(pos) {
   //    geocoder.geocode({
   //       latLng: pos
   //    });
   // }

   function updateMarkerPosition(latLng) {
    $('#txtLat').val(latLng.lat());
    $('#txtLong').val(latLng.lng());
   }

   function initialize() {
      var latLng = new google.maps.LatLng(dataLat, dataLng);
      map = new google.maps.Map(document.getElementById('map'), {
         zoom: 18,
         center: latLng,
         mapTypeId: google.maps.MapTypeId.ROADMAP
      });
      marker = new google.maps.Marker({
         position: latLng,
         title: 'Participante',
         map: map,
         draggable: true
      });

      // Update current position info.
      updateMarkerPosition(latLng);
      // geocodePosition(latLng);

      google.maps.event.addListener(marker, 'drag', function() {
         updateMarkerPosition(marker.getPosition());
      });
   }

   // Onload handler to fire off the app.
   google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script>
  $('#btnUpdateMap').click(function(event) {
    event.preventDefault();
    dataLat = $('#txtLat').val();
    dataLng = $('#txtLong').val();
    initialize();

  });
</script>
@endsection
