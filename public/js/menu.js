// Mobile fullscreeen Navigation
$('.mobile-toggle').click(function() {
        $('.main_h').addClass('open-nav');
        $('.center-menu-content').addClass('header-navigation-center');
        $( ".responsive-header,.close-about-section" ).slideDown( "slow", function() {});
});

$('.svg-close').click(function() {
$('.main_h').removeClass('open-nav');
$( ".responsive-header,.close-about-section" ).slideUp( "slow", function() {});
});

$('[data-btn-menu]').click(function(){
		$('.main_h').addClass('open-nav');
        $('.center-menu-content').addClass('header-navigation-center');
        $( ".responsive-header,.close-about-section" ).slideDown( "slow", function() {});
});

$('[data-dismiss]').click(function(){
  $('.alert').attr('style','display:none;');
});

	// function width for responsive

        $(document).ready(function(){

                if($(window).width() <= 828){

                        $('#inicio').click(function() {
                                $('.activo').removeClass('activo');
                                $('#inicio').attr('class','activo');
                                $('.main_h').removeClass('open-nav');
                                $( ".responsive-header,.close-about-section" ).slideUp( "slow", function() {});
                        });

                        $('#conocenos').click(function() {
                                $('.activo').removeClass('activo');
                                $('#nosotros').attr('class','activo');
                                $('.main_h').removeClass('open-nav');
                                $( ".responsive-header,.close-about-section" ).slideUp( "slow", function() {});
                        });

                        $('#redesocial').click(function() {
                                $('.activo').removeClass('activo');
                                $('#redesocial').attr('class','activo');
                                $('.main_h').removeClass('open-nav');
                                $( ".responsive-header,.close-about-section" ).slideUp( "slow", function() {});
                        });

                        $('#contacte').click(function() {
                                $('.activo').removeClass('activo');
                                $('#contacte').attr('class','activo');
                                $('.main_h').removeClass('open-nav');
                                $( ".responsive-header,.close-about-section" ).slideUp( "slow", function() {});
                        });

                        $('#log').click(function() {
                                $('.activo').removeClass('activo');
                                $('.main_h').removeClass('open-nav');
                                $( ".responsive-header,.close-about-section" ).slideUp( "slow", function() {});
                        });

                        $('#register').click(function() {
                                $('.activo').removeClass('activo');
                                $('.main_h').removeClass('open-nav');
                                $( ".responsive-header,.close-about-section" ).slideUp( "slow", function() {});
                        });




               } else{


                        $('#inicio').click(function() {
                                $('.activo').removeClass('activo');
                                $('#inicio').attr('class','activo');

                        });

                        $('#conocenos').click(function() {
                                $('.activo').removeClass('activo');
                                $('#nosotros').attr('class','activo');

                        });

                        $('#redesocial').click(function() {
                                $('.activo').removeClass('activo');
                                $('#redesocial').attr('class','activo');

                        });

                        $('#contacte').click(function() {
                                $('.activo').removeClass('activo');
                                $('#contacte').attr('class','activo');

                        });

                        $('#log').click(function() {
                                $('.activo').removeClass('activo');

                        });

                        $('#register').click(function() {
                                $('.activo').removeClass('activo');

                        });

               }


        });


