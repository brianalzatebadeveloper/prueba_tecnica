<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title','Default')</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description','')">
    <meta name="keywords" content="@yield('keywords','')">

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <link rel="stylesheet"  href="{{ asset('css/style.css') }}" id="styleSitie">
    <link rel="stylesheet" href="{{ asset('css/menu_estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/style-icons.css') }}">


   	<!-- fonts -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">

	@yield('customCss')

</head>
<body>

<!--  menu -->

	@include('elements.pagedefault.menu')

	@yield('content')

<!--  footer -->

	@include('elements.pagedefault.footer')

<!-- scripts -->
	<script src="{{ asset('js/jquery-2.1.1.js') }}"></script>
	<script src="{{ asset('js/jquery.browser.js') }}"></script>
	<script src="{{ asset('js/menu.js') }}"></script>

	<script>

		  $(document).ready(function(){

			  if ($.browser.msedge ) {

			    var style = "{{ asset('css/style-edge.css') }}";

			     $('#styleSitie').attr('href',style);
			  }

		  });

		$(function(){

		 	$('#checkboxBtn').click();

	// search button

			$('#search_button').click(function(){
				$('.search').fadeIn(500);
			});

			$('#search_responsive').click(function(){
				$('.search').fadeIn(500);
			});

			$('.icon-remove').click(function(){
				$('.search').fadeOut(300);
			});



			$('[data-btn-up]').click(function(){

				 $("html, body").animate({scrollTop:0},1100);
			});




		});

		function habilitarbnt() {
	        var boton = document.getElementById('checkboxBtn');
	        if (boton.checked) {
	            $('#enviar').attr("disabled", false);
	            document.getElementById('enviar').style = 'cursor:pointer';
	        } else {
	            $('#enviar').attr("disabled", true);
	            document.getElementById('enviar').style = 'cursor: not-allowed; box-shadow: none; opacity: 0.65;';
	        }
		}



		function habilitarbnt1() {
	        var boton = document.getElementById('checkboxBtn1');
	        if (boton.checked) {
	            $('#enviar1').attr("disabled", false);
	            document.getElementById('enviar1').style = 'cursor:pointer';
	        } else {
	            $('#enviar1').attr("disabled", true);
	            document.getElementById('enviar1').style = 'cursor: not-allowed; box-shadow: none; opacity: 0.65;';
	        }
		}



		function validarContact()
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


		function justNumbers(e){
	        var keynum = window.event ? window.event.keyCode : e.which;
	        if ((keynum == 8) || (keynum == 46))
	        return true;

	        return /\d/.test(String.fromCharCode(keynum));
	    }


	    function soloLetrases(e) {
	        key = e.keyCode || e.which;
	        tecla = String.fromCharCode(key).toLowerCase();
	        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
	        especiales = [8, 37, 39, 46];

	        tecla_especial = false
	        for(var i in especiales) {
	            if(key == especiales[i]) {
	                tecla_especial = true;
	                break;
	            }
	        }

	        if(letras.indexOf(tecla) == -1 && !tecla_especial)
	            return false;
	    }


	    $('[data-field-form]').blur(function(){

	        var idField = $(this).data('field-form');

	            var val = document.getElementById(idField).value;
	            var tam = val.length;
	            for(i = 0; i < tam; i++) {

	                if(!isNaN(val[i])){
	                    if(val[i] != ' '){
	                        document.getElementById(idField).value = '';
	                    }
	                }
	            }

	    });


	</script>

	@yield('customJs')

</body>
</html>
