@extends('layouts.admin')

@section('title','Nuevo Miembro')

@section('content')

<div class="">
            <div class="page-title">
              
                <div class="pull-left">
                    <h3>Nuevo Miembro</h3>
                </div>


            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />

                    {!! Form::open(['route' => 'customers.store', 'method' => 'POST']) !!}

                    <div class="form-group">

                    		{!! Form::label('name', 'Nombre') !!}
                    		{!! Form::text('name',null,['class' => 'form-control','required']) !!}
                            
                     </div>

                     <div class="form-group">

                     		{!! Form::label('lastname', 'Apellidos') !!}
                    		{!! Form::text('lastname',null,['class' => 'form-control','required']) !!}
                        
                     </div>

                     <div class="form-group">

                     		{!! Form::label('email', 'Email') !!}
                    		{!! Form::email('email',null,['class' => 'form-control','required']) !!}
                            
                     </div>

                     <div class="form-group">

                     		{!! Form::label('tipo_doc', 'Tipo de Documento') !!}
                    		{!! Form::select('tipo_doc',$tipoDoc, null,['class' => 'form-control','required','placeholder' => '--- Seleccione ---']) !!}
                           
                     </div>

                     <div class="form-group">

                     		{!! Form::label('number_doc', 'Número de Identidad') !!}
                    		{!! Form::number('number_doc',null,['class' => 'form-control','required']) !!}
                            
                     </div>

                     <div class="form-group">

                     		{!! Form::label('phone', 'Teléfono o Celular') !!}
                    		{!! Form::number('phone',null,['class' => 'form-control']) !!}
                           
                     </div>

                     <div class="form-group">

                     		{!! Form::label('city', 'Ciudad') !!}
                    		{!! Form::text('city',null,['class' => 'form-control']) !!}

                     </div>

                     <div class="form-group">

                     		{!! Form::label('address', 'Direccion') !!}
                    		{!! Form::text('address',null,['class' => 'form-control']) !!}

                     </div>

                     <div class="form-group">

                     		{!! Form::label('password', 'Contraseña') !!}
                    		{!! Form::password('password',['class' => 'form-control','required']) !!}
                           
                     </div>

                      <div class="form-group">

                      		{!! Form::label('type_member', 'Tipo usuario') !!}
                    		{!! Form::select('type_member',$tipoCustomer, null,['class' => 'form-control','required','placeholder' => '--- Seleccione ---','required']) !!}
                            
                     </div>

                      <div class="form-group" style="padding-bottom: 2em;">
                       
                       	{!! Form::submit('Guardar',['class' => 'btn btn-success']) !!}
                       	<a href="{{ route('customers.index') }}" class="btn btn-danger">Cancelar</a>
                          
                      </div>

                 	{!! Form::close() !!}

                  </div>
                </div>
              </div>
            </div>
          </div>


@endsection