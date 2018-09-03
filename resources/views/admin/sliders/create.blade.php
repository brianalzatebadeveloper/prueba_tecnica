@extends('layouts.admin')

@section('title','Nuevo slider')

@section('content')

<div class="">
            <div class="page-title">
              
                <div class="pull-left">
                    <h3>Nuevo Slider</h3>
                </div>
                
        	</div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                  {!! Form::open(['route' => 'sliders.store', 'method' => 'POST', 'files' => true, 'class' => 'form-horizontal form-label-lef']) !!}
                
                    <div class="form-group">

	                  	{!! Form::label('title','Titulo') !!}
	                    {!! Form::textarea('title', null, ['class' => 'tinymce']) !!}
	                              
                     </div>

                     <div class="form-group">

                     	{!! Form::label('text','Texto') !!}
	                    {!! Form::textarea('text', null, ['class' => 'tinymce']) !!}
                                                        
                     </div>

                     <div class="form-group">

                 		{!! Form::label('url','Url') !!}
	                    {!! Form::text('url', null, ['class' => 'form-control']) !!}
                                                        
                     </div>

                    <div class="form-group" style="overflow:hidden;">

                    	{!! Form::label('image','Imagen (mínimo 973 x 649px - Máximo 2000 x 1500px)') !!}
	                    {!! Form::file('image') !!}
                                                       
                    </div>

                    <div class="form-group">

	                           {!! Form::label('title_image','Title Imagen') !!}
	                           {!! Form::text('title_image', null, ['class' => 'form-control']) !!}
	                </div>
	                           
	                <div class="form-group"> 

	                    	   {!! Form::label('alt_image','Alt Imagen') !!}
	                           {!! Form::text('alt_image', null, ['class' => 'form-control']) !!}       
	                            
	                </div>

                  <!--   <div class="form-group" style="overflow:hidden;">

                            {!! Form::label('image_responsive','Imagen (mínimo 973 x 649px - Máximo 2000 x 1500px)') !!}
	                    	{!! Form::file('image_responsive') !!}
                            
                    </div>

                    <div class="form-group">

	                           {!! Form::label('title_image2','Title Imagen') !!}
	                           {!! Form::text('title_image2', null, ['class' => 'form-control']) !!}
	                </div>
	                           
	                <div class="form-group"> 

	                    	   {!! Form::label('alt_image2','Alt Imagen') !!}
	                           {!! Form::text('alt_image2', null, ['class' => 'form-control']) !!}       
	                            
	                </div> -->

                      <div class="form-group" style="padding-bottom: 2em;">

                       	{!! Form::submit('Guardar',['class' => 'btn btn-success']) !!}
                       	<a href="{{ route('sliders.index') }}" class="btn btn-danger">Cancelar</a>
                         
                      </div>

                     



                  {!! Form::close() !!}

                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection