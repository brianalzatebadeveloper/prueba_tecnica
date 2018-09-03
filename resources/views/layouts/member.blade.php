<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title','default') - Miembro</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   	<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />

   	<link rel="stylesheet" type="text/css" href="{{ asset('mng/bootstrap/dist/css/bootstrap.min.css') }}">
   	<link rel="stylesheet" type="text/css" href="{{ asset('mng/font-awesome/css/font-awesome.min.css') }}">
   	<link rel="stylesheet" type="text/css" href="{{ asset('mng/nprogress/nprogress.css') }}">
   	<link rel="stylesheet" type="text/css" href="{{ asset('mng/iCheck/skins/flat/green.css') }}">
   	<link rel="stylesheet" type="text/css" href="{{ asset('mng/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">
   	<link rel="stylesheet" type="text/css" href="{{ asset('mng/jqvmap/dist/jqvmap.min.css') }}">
   	<link rel="stylesheet" type="text/css" href="{{ asset('mng/bootstrap-daterangepicker/daterangepicker.css') }}">
   	<link rel="stylesheet" type="text/css" href="{{ asset('css/mng/custom.min.css') }}">
   	<link rel="stylesheet" type="text/css" href="{{ asset('mng/dropzone/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mng/stylesPersonals.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('mng/pnotify/dist/pnotify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('mng/pnotify/dist/pnotify.buttons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('mng/pnotify/dist/pnotify.nonblock.css') }}">

	@yield('customCss')

</head>
<body class="nav-md">

<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0; text-align: center;">
              <a href="#" class="site_title"><span>{{ 'Member' }}</span></a>
              <a href="{{ url('/') }}" target="_blank" style="color: #fff;">Ver sitio</a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('img/user-ico.png') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido(a),</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

             @include('elements.member.menu')

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('img/user-ico.png') }}" alt="">{{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">

                    <li>
                    <a href="{{ route('members.logout') }}"><i class="fa fa-sign-out pull-right"></i> Salir </a>

                  </ul>
                </li>

                <li role="presentation" class="dropdown" id="contacts">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">0</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <div class="text-center">
                        <a href="{{ route('contacts.index') }}">
                          <strong>Ver todos los usuarios </strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">

            @include('elements.error.error')

            @include('flash::message')

            @yield('content')

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
           Copyright © || All reserved right to Brian Steven Alzate Garcia Developer Backend and frontend
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->


        {!! Form::open(['route' => 'refresh.contacts', 'method' => 'POST', 'id' => 'formRefresh']) !!}
        {!! Form::close() !!}

      </div>
    </div>


    <!-- JS -->
    <script src="{{ asset('mng/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('mng/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('mng/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ asset('mng/nprogress/nprogress.js') }}"></script>
    <script src="{{ asset('mng/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ asset('mng/Chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('mng/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('mng/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('mng/skycons/skycons.js') }}"></script>
    <script src="{{ asset('mng/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('mng/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('mng/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('mng/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('mng/Flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('mng/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('mng/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('mng/flot.curvedlines/curvedLines.js') }}"></script>
    <script src="{{ asset('mng/DateJS/build/date.js') }}"></script>
    <script src="{{ asset('mng/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('mng/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('mng/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('mng/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('mng/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/mng/custom.min.js') }}"></script>
    <script src="{{ asset('mng/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('js/mng/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('js/mng/jquery.ui.min.js') }}"></script>
    <script src="{{ asset('mng/pnotify/dist/pnotify.js') }}"></script>
    <script src="{{ asset('mng/pnotify/dist/pnotify.buttons.js') }}"></script>
    <script src="{{ asset('mng/pnotify/dist/pnotify.nonblock.js') }}"></script>


 <script type="text/javascript">

      tinyMCE.init({
        language: "es_MX",
        selector:".tinymce",
        theme_advanced_text_colors : "FF00FF,FFFF00,000000",
        plugins:"link image media textcolor code",
        toolbar:"bullist | link | image | media | styleselect | bold italic | forecolor backcolor code",
        force_br_newlines : false,
        force_p_newlines : false,
        forced_root_block : '',
        convert_urls: false,
        valid_elements : '*[*]',
        file_browser_callback:function(d,a,b,c){
            tinyMCE.activeEditor.windowManager.open({
                file:baseRoot+"js/mng/kcfinder/browse.php?opener=tinymce4&field="+d+"&type="+b+"&lang=es&dir="+b+"/public",
                title:"Administrador de archivos",
                width:700,
                height:500,
                inline:true,
                close_previous:false
            },
            {
              window:c,input:d
            });
            return false;
          }});





// remove nofication welcome pnotify

       $(document).ready(function (){
               $('.ui-pnotify').remove();

       });


    </script>

  @yield('customJs')

</body>
</html>