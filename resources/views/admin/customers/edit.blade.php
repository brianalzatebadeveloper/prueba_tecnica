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

                    {!! Form::open(['route' => ['customers.update',$member->id], 'method' => 'PUT']) !!}

                    <div class="form-group">

                    		{!! Form::label('name', 'Nombre') !!}
                    		{!! Form::text('name',$member->name,['class' => 'form-control','required']) !!}
                            
                     </div>

                     <div class="form-group">

                     		{!! Form::label('lastname', 'Apellidos') !!}
                    		{!! Form::text('lastname',$member->lastname,['class' => 'form-control','required']) !!}
                        
                     </div>

                     <div class="form-group">

                     		{!! Form::label('email', 'Email') !!}
                    		{!! Form::email('email',$member->email,['class' => 'form-control','required']) !!}
                            
                     </div>

                     <div class="form-group">

                     		{!! Form::label('tipo_doc', 'Tipo de Documento') !!}
                    		{!! Form::select('tipo_doc',$tipoDoc, $member->tipo_doc,['class' => 'form-control','required','placeholder' => '--- Seleccione ---']) !!}
                           
                     </div>

                     <div class="form-group">

                     		{!! Form::label('number_doc', 'Número de Identidad') !!}
                    		{!! Form::number('number_doc',$member->number_doc,['class' => 'form-control','required']) !!}
                            
                     </div>

                     <div class="form-group">

                     		{!! Form::label('phone', 'Teléfono o Celular') !!}
                    		{!! Form::number('phone',$member->phone,['class' => 'form-control']) !!}
                           
                     </div>

                     <div class="form-group">

                     		{!! Form::label('city', 'Ciudad') !!}
                    		{!! Form::text('city',$member->city,['class' => 'form-control']) !!}

                     </div>

                     <div class="form-group">

                     		{!! Form::label('address', 'Direccion') !!}
                    		{!! Form::text('address',$member->address,['class' => 'form-control']) !!}

                     </div>

                     <div class="form-group">

                     		{!! Form::label('password', 'Contraseña (Ingrese una contraseña solo si desea cambiarla.)') !!}
                    		{!! Form::password('password',['class' => 'form-control']) !!}
                           
                     </div>

                      <div class="form-group">

                      		{!! Form::label('type_member', 'Tipo usuario') !!}
                    		{!! Form::select('type_member',$tipoCustomer, $member->type_member,['class' => 'form-control','required','placeholder' => '--- Seleccione ---','required']) !!}
                            
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