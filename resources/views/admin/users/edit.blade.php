@extends('layouts.admin')

@section('title','Modificar Administrador')

@section('content')
	
	<div class="">
            <div class="page-title">
              
                <div class="pull-left">
                    <h3>Modificar Administrador</h3>
                </div>


            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />

                    {!! Form::open(['route' => ['users.update',$admin->id], 'method' => 'PUT']) !!}

                    <div class="form-group">

                    		{!! Form::label('name', 'Nombre y Apellidos') !!}
                    		{!! Form::text('name',$admin->name,['class' => 'form-control','required']) !!}
                            
                     </div>

                     <div class="form-group">

                     		{!! Form::label('email', 'Email') !!}
                    		{!! Form::email('email',$admin->email,['class' => 'form-control','required']) !!}
                            
                     </div>

                     <div class="form-group">

                     		{!! Form::label('password', 'Contraseña (Ingrese una contraseña solo si desea cambiarla.)') !!}
                    		{!! Form::password('password',['class' => 'form-control']) !!}
                           
                     </div>

                    
                      <div class="form-group" style="padding-bottom: 2em;">
                       
                       	{!! Form::submit('Guardar',['class' => 'btn btn-success']) !!}
                       	<a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
                          
                      </div>

                 	{!! Form::close() !!}

                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection