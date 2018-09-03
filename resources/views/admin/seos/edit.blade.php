@extends('layouts.admin')

@section('title', 'Modificar seo')

@section('content')

<div class="">
            <div class="page-title">
              
                <div class="pull-left">
                   <h3>Modificar SEO - {{ $seo->section }}</h3>
                </div>
                
              
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
              
                      {!! Form::open(['route' => ['seos.update',$seo->id], 'method' => 'PUT']) !!}

                           
                          <div class="form-group">

                                {!! Form::label('meta_title', 'Meta Title') !!}
                                {!! Form::text('meta_title', $seo->meta_title, ['class' => 'form-control']) !!}
                                  
                           </div>
                           <div class="form-group">

                                {!! Form::label('meta_description','Meta Description') !!}
                                {!! Form::textarea('meta_description',$seo->meta_description, ['class' => 'form-control']) !!}
                                    
                           </div>
                           <div class="form-group">

                                {!! Form::label('meta_keywords','Meta Keywords') !!}
                                {!! Form::textarea('meta_keywords', $seo->meta_keywords, ['class' => 'form-control']) !!}
                                  
                           </div>

                      <div class="form-group" style="padding-bottom: 2em;">

                          {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                          <a href="{{ route('seos.index') }}" class="btn btn-danger">Cancelar</a>
                      
                      </div>
     
                     {!! Form::close() !!}
                    

                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection