@extends('layouts.default')

@section('title')
	{{ $seo['meta_title'] }}
@endsection

@section('description')
	{{ $seo['meta_description'] }}
@endsection

@section('keywords')
	{{ $seo['meta_keywords'] }}
@endsection

@section('customCss')
	<link rel="stylesheet" href="{{ asset('css/flexslider.css') }}">
@endsection


@section('content')

<!-- modal services -->
@include('elements.pagedefault.modal')

<!-- slider -->
<div class="slider_home">
 	<div class="flexslider">
 		<ul class="slides">

 			@foreach($slider as $key => $item)

				<li>
	 				<img src="{{ asset('img/slider/'.$item->image) }}" title="{{ $item->title_image}}" alt="{{ $item->alt_image }}">
	 				<div class="background-slider"></div>
	 				<section class="flex-caption">
	 					{!! $item->title !!}
	 					{!! $item->text !!}
	 					<a href="{{ $item->url }}">Ver más</a>
	 				</section>
	 			</li>

 		    @endforeach

 		</ul>
 	</div>
 </div>


 <!-- text informative -->

<section class="content_info" id="conocenos">

	<div class="text_content_info">

		{!! $content[0]['text'] !!}

		{!! $content[0]['text_2'] !!}

	</div>

	<div class="image_content_info">
		<div class="img_info" style="background-image: url('{{ asset('img/content/'.$content[0]['image']) }}');" title="{{ $content[0]['title_image'] }}" alt="{{ $content[0]['alt_image'] }}"></div>
	</div>

</section>

<!-- services -->

<section class="services_content" id="redes">
	<div class="text_services_intro">
		{!! $content[1]['text'] !!}
	</div>

	<article class="items_services">

		@foreach($service as $key => $services)

			<div class="item_services">
				<span class="{{ $services->icon }}"></span>
			</div>

		@endforeach

	</article>
</section>

<!-- banner -->

<section class="banner_info" style="background-image: url('{{ asset('img/content/'.$content[1]['image']) }}');" title="{{ $content[1]['title_image'] }}" alt="{{ $content[1]['alt_image'] }}">
		<div class="content_banner_info">
			{!! $content[1]['text_2'] !!}
		</div>
</section>

<!-- contact -->

@include('elements.pagedefault.form-contact')

@endsection

@section('customJs')

<script src="{{ asset('js/jquery.flexslider-min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/fancybox/dist/jquery.fancybox.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('js/fancybox/dist/jquery.fancybox.min.css') }}" media="screen" />

<script type="text/javascript">

	$("[data-fancybox]").fancybox({
		// Options will go here
	});

</script>

<script>


	 $(window).scroll(function(){


	       if($(this).scrollTop() > 50){

	 			$('#btnUp').attr('style','display:block;');
				$('header').attr('style','background-color:rgba(169, 238, 230, 0.9);box-shadow: 0px -3px 30px 1px rgba(0,0,0,0.3);');



	 		} else{

	 			$('#btnUp').attr('style','display:none;');
				$('header').attr('style','background-color:rgba(169, 238, 230, 1);');

	 		}

	 });

	$(function(){

		$('#inicio').attr('class','activo');
		$('#checkboxBtn1').click();


// slider

		$(window).load(function() {
			$('.flexslider').flexslider();

			  $('.flexslider').load({
				    mode: 'fade',
				    auto: true,
				    pause: 300,
				    speed: 100
			  });
		});



		$('#log').click(function(event){
			event.preventDefault();

			$('body').attr('style','overflow:hidden;');

				$('#login').slideDown(300);

		});

		$('#register').click(function(event){
			event.preventDefault();

			$('body').attr('style','overflow:hidden;');

				$('#registers').slideDown(300);

		});



// function modals

	var baseRoot = "{{ route('page.home') }}";
	var _token = $("#formAjax :input[name=_token]").val();


		$('.btn_plan').click(function(event){
			event.preventDefault();

			$('body').attr('style','overflow:hidden;');

				var plan = $(this).data('plan');
				var item = '#plan_' + plan;


				$.ajax({
					url: baseRoot,
					type: 'POST',
					dataType: 'json',
					async: false,
					data: {_token:_token, id:plan},
					beforeSend: function()
					{
						$(item).html('Cargando...');
					},
					success: function(response)
					{

						var image = "{{ asset('img/plan') }}"+ "/" +response.image;

						$('.info_content_modal').attr('style','background-image: url('+image+')');
						$('#namePlan').html(response.name);
						$('#priceModal').html('$'+response.price);
						$('#textModal').html(response.text_intro);
						$('#idPlan').attr('value',response.id);

					},
					complete: function()
					{
						$(item).html('Adquirir Plan');
					}

				});

				$('.modal_services').slideDown(300);

		});


	});


	function cerrarPlan(){

		$('.modal_services').slideUp(500);
		$('body').attr('style','overflow-y:scroll;');
	}

	$('#enviar').click(function(){

		$('#name').attr('onblur','javascript:return validar();');
		$('#email').attr('onblur','javascript:return validar();');
		$('#phone').attr('onblur','javascript:return validar();');
		$('#city').attr('onblur','javascript:return validar();');
		$('#message').attr('onblur','javascript:return validar();');
	});

	$('#enviar1').click(function(){

		$('#name1').attr('onblur','javascript:return validarRegisters();');
		$('#email1').attr('onblur','javascript:return validarRegisters();');
		$('#city1').attr('onblur','javascript:return validarRegisters();');
		$('#password1').attr('onblur','javascript:return validarRegisters();');
	});

	function validar()
 	{
 		 	var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var emailPer = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            var phone = document.getElementById('phone').value;
            var city = document.getElementById('city').value;
            var message = document.getElementById('message').value;


           if(name.trim() == '')
           {
           		$('#alert1').html('Ingrese nombre').fadeIn(300);
           		$('#alert1').attr('class','alert alert-danger');

           		$('#name').focus();

           		return false;
           }
           else
           {
           	 $('#alert1').html('').fadeOut(500);
           }

           if(email.trim() == '')
           {
           		$('#alert1').html('Ingrese E-mail').fadeIn(300);
           		$('#alert1').attr('class', 'alert alert-danger');

           		$('#email').focus();

           		return false;
           }
           else
           {
           	  $('#alert1').html('').fadeOut(500);
           }

           if(!emailPer.test(email.trim()))
           {
           		$('#alert1').html('E-mail incorrecto').fadeIn(300);
           		$('#alert1').attr('class', 'alert alert-danger');

           		$('#email').focus();

           		return false;
           }
           else
           {
           	  $('#alert1').html('').fadeOut(500);
           }

           if(phone.trim() == '')
           {
           		$('#alert1').html('Ingrese Teléfono o Celular').fadeIn(300);
           		$('#alert1').attr('class','alert alert-danger');

           		$('#phone').focus();

           		return false;
           }
           else
           {
           		$('#alert1').html('').fadeOut(500);
           }

           if(city.trim() == '')
           {
           		$('#alert1').html('Ingrese Ciudad').fadeIn(300);
           		$('#alert1').attr('class','alert alert-danger');

           		$('#city').focus();

           		return false;
           }
           else
           {
           		$('#alert1').html('').fadeOut(500);
           }


           if(message.trim() == '')
           {
           		$('#alert1').html('Ingrese Descripción').fadeIn(300);
           		$('#alert1').attr('class','alert alert-danger');

           		$('#message').focus();

           		return false;
           }
           else
           {
           		$('#alert1').html('').fadeOut(500);
		   }
		}

		function validarLogin()
		{

		var email = document.getElementById('email2').value;
		var emailPer = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
		var password = document.getElementById('password2').value;




		if(email.trim() == '')
		{
			$('#alert3').html('Ingrese E-mail').fadeIn(300);
			$('#alert3').attr('class', 'alert alert-danger');

			$('#email2').focus();

			return false;
		}
		else
		{
			$('#alert3').html('').fadeOut(500);
		}

		if(!emailPer.test(email.trim()))
		{
			$('#alert3').html('E-mail incorrecto').fadeIn(300);
			$('#alert3').attr('class', 'alert alert-danger');

			$('#email2').focus();

			return false;
		}
		else
		{
			$('#alert3').html('').fadeOut(500);
		}

		if(password.trim() == '')
		{
			$('#alert3').html('Ingrese Contraseña').fadeIn(300);
			$('#alert3').attr('class','alert alert-danger');

			$('#password2').focus();

			return false;
		}
		else
		{
			$('#alert3').html('').fadeOut(500);
		}

	 }

	 function validarRegisters()
 	 {
 		 	var name = document.getElementById('name1').value;
            var email = document.getElementById('email1').value;
            var emailPer = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            var city = document.getElementById('city1').value;
			var password = document.getElementById('password1').value;


           if(name.trim() == '')
           {
           		$('#alert2').html('Ingrese nombre').fadeIn(300);
           		$('#alert2').attr('class','alert alert-danger');

           		$('#name1').focus();

           		return false;
           }
           else
           {
           	 $('#alert2').html('').fadeOut(500);
           }

           if(email.trim() == '')
           {
           		$('#alert2').html('Ingrese E-mail').fadeIn(300);
           		$('#alert2').attr('class', 'alert alert-danger');

           		$('#email1').focus();

           		return false;
           }
           else
           {
           	  $('#alert2').html('').fadeOut(500);
           }

           if(!emailPer.test(email.trim()))
           {
           		$('#alert2').html('E-mail incorrecto').fadeIn(300);
           		$('#alert2').attr('class', 'alert alert-danger');

           		$('#email1').focus();

           		return false;
           }
           else
           {
           	  $('#alert2').html('').fadeOut(500);
           }


           if(city.trim() == '')
           {
           		$('#alert2').html('Ingrese Ciudad').fadeIn(300);
           		$('#alert2').attr('class','alert alert-danger');

           		$('#city1').focus();

           		return false;
           }
           else
           {
           		$('#alert2').html('').fadeOut(500);
           }


           if(password.trim() == '')
           {
           		$('#alert2').html('Ingrese Contraseña').fadeIn(300);
           		$('#alert2').attr('class','alert alert-danger');

           		$('#password1').focus();

           		return false;
           }
           else
           {
           		$('#alert2').html('').fadeOut(500);
		   }
		}





</script>

@endsection
