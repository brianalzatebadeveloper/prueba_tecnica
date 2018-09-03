@extends('layouts.admin')

@section('title','Modificar Contenido')

@section('content')

<?php

$sectionsText = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17];
$sectionsText_2 = [1,2,3,6,8,9,10,11,14,17];
$sectionsText_3 = [17];
$sectionsText_4 = [];
$sectionsImage = [1,2,3,4,6,8,9,10,11,12,14,17];
$sectionsImage_2 = [];
$sectionsImage_3 = [];
$sectionsImage_4 = [];
$sectionsUrl = [];
$sectionsUrl_2 = [];

$dimensionsImage = [
  1 => 'mínimo 973 x 650px - máximo 1600 x 1100px',
  2 => 'mínimo 1600 x 1100px',
  3 => 'mínimo 973 x 650px - máximo 1600 x 1100px',
  4 => 'mínimo 973 x 650px',
  6 => 'mínimo 973 x 650px - máximo 1600 x 1100px',
  8 => 'mínimo 973 x 650px - máximo 1600 x 1100px',
  9 => 'mínimo 973 x 650px - máximo 1600 x 1100px',
  10 => 'mínimo 973 x 650px - máximo 1600 x 1100px',
  11 => 'mínimo 973 x 650px - máximo 1600 x 1100px',
  12 => 'mínimo 973 x 650px',
  14 => 'mínimo 973 x 650px - máximo 1600 x 1100px',
  17 => 'mínimo 1600 x 1100px',
];

$dimensionsImage_2 = [];

$dimensionsImage_3 = [];

$dimensionsImage_4 = [];

?>

          <div class="">
            <div class="page-title">
              <div class="pull-left">
                <h3>Editar <?php echo $content->name; ?></h3>
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />

                    {!! Form::open(['route' => ['contents.update',$content->id], 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal form-label-lef']) !!}

                @if(in_array($content->id, $sectionsText))
                    <div class="form-group">

                           {!! Form::label('text','Texto 1') !!}
                           {!! Form::textarea('text', $content->text, ['class' => 'tinymce form-control col-md-7 col-xs-12']) !!}

                     </div>
                @endif

                @if(in_array($content->id, $sectionsText_2))
                    <div class="form-group">

                           {!! Form::label('text_2','Texto 2') !!}
                           {!! Form::textarea('text_2', $content->text_2, ['class' => 'tinymce form-control col-md-7 col-xs-12']) !!}

                     </div>
                @endif

            	@if(in_array($content->id, $sectionsText_3))
                    <div class="form-group">

                           {!! Form::label('text_3','Texto 3') !!}
                           {!! Form::textarea('text_3', $content->text_3, ['class' => 'tinymce form-control col-md-7 col-xs-12']) !!}

                     </div>
            	@endif

           		@if(in_array($content->id, $sectionsText_4))
                    <div class="form-group">

                           {!! Form::label('text_4','Texto 4') !!}
                           {!! Form::textarea('text_4', $content->text_4, ['class' => 'tinymce form-control col-md-7 col-xs-12']) !!}

                     </div>
                @endif


        		@if(in_array($content->id, $sectionsImage))
	                  <?php
	                   $dimension = "";
	                  if(isset($dimensionsImage[$content->id])){
	                       $dimension = $dimensionsImage[$content->id];
	                  }

	                  ?>



                    <div class="form-group" style="overflow:hidden;">

                           {!! Form::label('image', 'Imagen ('.$dimension.')') !!}
                           {!! Form::file('image') !!}

                           <img src="{{ asset('img/content/'.$content->image) }}" width="200" class="img-thumbnail" alt="">

                    </div>



					<div class="form-group">

	                           {!! Form::label('title_image','Title Imagen') !!}
	                           {!! Form::text('title_image', $content->title_image, ['class' => 'form-control col-md-7 col-xs-12']) !!}
	                </div>

	                <div class="form-group">

	                    	   {!! Form::label('alt_image','Alt Imagen') !!}
	                           {!! Form::text('alt_image', $content->alt_image, ['class' => 'form-control col-md-7 col-xs-12']) !!}

	                </div>

                @endif

         		@if(in_array($content->id, $sectionsImage_2))
	                 <?php
	                   $dimension = "";
	                   if(isset($dimensionsImage_2[$content->id])){
	                       $dimension = $dimensionsImage_2[$content->id];
	                   }
	                  ?>
	                <div class="form-group" style="overflow:hidden;">

		                       {!! Form::label('image_2', 'Imagen 2 ('.$dimension.')') !!}
	                           {!! Form::file('image_2') !!}

	                           <img src="{{ asset('img/content/'.$content->image_2) }}" width="200" class="img-thumbnail" alt="">


                    </div>


                    <div class="form-group">

                    	       {!! Form::label('title_image2','Title Imagen2') !!}
	                           {!! Form::text('title_image2', $content->title_image2, ['class' => 'form-control col-md-7 col-xs-12']) !!}

                    </div>
                    <div class="form-group">

                    	       {!! Form::label('alt_image2','Alt Imagen2') !!}
	                           {!! Form::text('alt_image2', $content->alt_image2, ['class' => 'form-control col-md-7 col-xs-12']) !!}


                    </div>

                @endif

                @if(in_array($content->id, $sectionsImage_3))
	                 <?php
	                   $dimension = "";
	                   if(isset($dimensionsImage_3[$content->id])){
	                       $dimension = $dimensionsImage_3[$content->id];
	                   }
	                  ?>
	                <div class="form-group" style="overflow:hidden;">

		                       {!! Form::label('image_3', 'Imagen 3 ('.$dimension.')') !!}
	                           {!! Form::file('image_3') !!}

	                           <img src="{{ asset('img/content/'.$content->image_3) }}" width="200" class="img-thumbnail" alt="">


                    </div>


                    <div class="form-group">

                    	       {!! Form::label('title_image3','Title Imagen3') !!}
	                           {!! Form::text('title_image3', $content->title_image3, ['class' => 'form-control col-md-7 col-xs-12']) !!}

                    </div>
                    <div class="form-group">

                    	       {!! Form::label('alt_image3','Alt Imagen3') !!}
	                           {!! Form::text('alt_image3', $content->alt_image3, ['class' => 'form-control col-md-7 col-xs-12']) !!}


                    </div>

                @endif

                @if(in_array($content->id, $sectionsImage_4))
	                 <?php
	                   $dimension = "";
	                   if(isset($dimensionsImage_4[$content->id])){
	                       $dimension = $dimensionsImage_4[$content->id];
	                   }
	                  ?>
	                <div class="form-group" style="overflow:hidden;">

		                       {!! Form::label('image_4', 'Imagen 4 ('.$dimension.')') !!}
	                           {!! Form::file('image_4') !!}

	                           <img src="{{ asset('img/content/'.$content->image_4) }}" width="200" class="img-thumbnail" alt="">


                    </div>


                    <div class="form-group">

                    	       {!! Form::label('title_image4','Title Imagen4') !!}
	                           {!! Form::text('title_image4', $content->title_image4, ['class' => 'form-control col-md-7 col-xs-12']) !!}

                    </div>
                    <div class="form-group">

                    	       {!! Form::label('alt_image4','Alt Imagen4') !!}
	                           {!! Form::text('alt_image4', $content->alt_image4, ['class' => 'form-control col-md-7 col-xs-12']) !!}


                    </div>

                @endif




            	@if(in_array($content->id, $sectionsUrl))
                    <div class="form-group">

                    		   {!! Form::label('url','Url') !!}
	                           {!! Form::text('url', $content->url, ['class' => 'form-control col-md-7 col-xs-12']) !!}

                    </div>
                @endif

                @if(in_array($content->id, $sectionsUrl_2))
                    <div class="form-group">

                    		   {!! Form::label('url_2','Url 2') !!}
	                           {!! Form::text('url_2', $content->url_2, ['class' => 'form-control col-md-7 col-xs-12']) !!}

                     </div>
                @endif

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12" style="padding-bottom: 2em;">
                        		{!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                        		<a href="{{ route('contents.index',$section_id) }}" class="btn btn-danger">Cancelar</a>

                        </div>
                      </div>

                      {!! Form::close() !!}

					</div>

                  </div>
                </div>
              </div>
            </div>
      </div>


   </div>

@endsection