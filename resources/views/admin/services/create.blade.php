@extends('layouts.admin')

@section('title',' Nuevo servicio')

@section('content')


<div class="">
            <div class="page-title">

                <div class="pull-left">
                    <h3>Nuevo Servicio</h3>
                </div>

          </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                  {!! Form::open(['route' => 'services.store', 'method' => 'POST', 'files' => true, 'class' => 'form-horizontal form-label-lef']) !!}

                    <div class="form-group">

                      {!! Form::label('name','Nombre del Servicio') !!}
                      {!! Form::text('name', null, ['class' => 'form-control','required']) !!}

                    </div>


                            <div class="form-group">

                              {!! Form::label('icon','Icono del servicio') !!}
                              {!! Form::text('icon', null, ['class' => 'form-control','required']) !!}

                            </div>



                      <div class="form-group" style="padding-bottom: 2em;">

                        {!! Form::submit('Guardar',['class' => 'btn btn-success']) !!}
                        <a href="{{ route('services.index') }}" class="btn btn-danger">Cancelar</a>

                      </div>





                  {!! Form::close() !!}

                  </div>
                </div>
              </div>
            </div>
          </div>



@endsection

