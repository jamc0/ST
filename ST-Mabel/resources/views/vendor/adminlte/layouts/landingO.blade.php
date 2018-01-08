<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ trans('sociales.aplication_og_description')}}">
    <meta name="author" content="Departamento de Tecnología de Información">

    @include('adminlte::layouts.partials.sociales')

    <title>ACME</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="icon" type="image/png" href="/img/acme_logo.png" sizes="16x16">

    <style>
        



        
        .verde
        {
            color:green;
        }
        .acme1
        {
            color:#212121;
            font-size: 45rem;
        }
        .fa-cube,.fa-shopping-cart,.fa-bar-chart, .fa-btc, .fa-bars
        {
            /*color:#3c8dbc;*/
            color: #F5F5F5;
        }
        .azul
        {
            /*color:#3c8dbc;   */
            color: #212121;
        }
        .blanco
        {
            color: #F5F5F5; 
        }
        .blanco-bg
        {
            background: #F5F5F5;
        }
        .fa-facebook-square,.fa-facebook-square:hover
        {
            color:#3b5998;
        }
        .fa-youtube-square
        {
            color:red;
        }
        .fa-twitter-square,.fa-twitter-square:hover
        {
            color:#3c8dbc;
        }
        #jumbotron-landing
        {background-image: url({{ asset('/img/acme2.png') }});
        background-repeat: no-repeat;
        }

        #footerwrap {
                background-color:  #F5F5F5;
        }


        div    { background: #3c8dbc; }
       

    </style>
</head> 

<body data-spy="scroll" data-target="#navigation" data-offset="50" class="skin-blue">

<div id="app" v-cloak>
    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top" >
        <div class="container-fluid " style="background-color: #0288D1;">
            <div class="navbar-header" style="background-color: #0288D1;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><b class="blanco">{{ trans('sociales.aplication_og_title')}}</b></a>
            </div>
            <div class="navbar-collapse collapse " style="background-color: #0288D1;">
                <ul class="nav navbar-nav">
                    <li class="active "><a href="#home" class="smoothScroll" style="color: #ffffff;">{{ trans('adminlte_lang::message.home') }}</a></li>
                    <li><a href="#desc" class="smoothScroll" style="color: #ffffff;">{{ trans('adminlte_lang::message.description') }}</a></li>
                    {{-- <li><a href="#showcase" class="smoothScroll" style="color: #ffffff;">{{ trans('adminlte_lang::message.showcase') }}</a></li> --}}
                    <li><a href="#contact" class="smoothScroll" style="color: #ffffff;">{{ trans('adminlte_lang::message.contact') }}</a></li>
                    <!-- Borrar -->
                    <!-- <li><a href="{{url('admin/PersonaNatural')}}">R. Persona Natural</a></li> -->
                    <!-- Fin Borrar -->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}" style="color: #ffffff;">{{ trans('adminlte_lang::message.login') }}</a></li>
                        <li><a href="{{ url('/register') }}" style="color: #ffffff;">{{ trans('adminlte_lang::message.register') }}</a></li>
                    @else
                        <li><a href="/home" style="color: #ffffff;">{{ Auth::user()->name }}</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <!-- <section id="home" name="home">
         <div id="jumbotron-landing" class="jumbotron">
      <div class="container">
        <div class="row">
          <div class="pull-left">
            {{-- <img src="images/logjo.png" alt="Logooo"> --}}
            br*
          </div>
      </div>
  </div>
</div> -->
</section>

    <!-- <section id="home" name="home">
        <div class="container-fluid jumnbotron" id="jumbotron-landing">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>

    </section> -->
    <section>
        <div class="row">
            <div class="col-sm-12">
                <div class="container-fluid" id="home" name="home">
                    <h1 class="acme1 text-sm-center h1 font-italic" style="color: #ffffff;">
                        ACME
                    </h1>
                    <h2 class="text-center blanco">Si no lo tenemos, solo pidalo</h2>
                </div>
            </div>
            
        </div>
        

    </section>
    
    
   <!--  <section id="home" name="home">
         <div id="jumbotron-landing" class="jumbotron">
      <div class="container">
        <div class="row">
          <div class="pull-left">
            {{-- <img src="images/logjo.png" alt="Logooo"> --}}
          </div>
          <div class="pull-right">
            <div itemscope itemtype="https://schema.org/FollowAction">
                <a class="sociales" href="http://www.gooogle.com" target="_blank" title="Facebook" itemprop="followee"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
                <a  class="sociales" href="http://www.gooogle.com" target="_blank" title="Twitter" itemprop="followee"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>
                <a class="sociales" href="http://www.gooogle.com" target="_blank" title ="YouTube" itemprop="followee"><i class="fa fa-youtube-square fa-3x" aria-hidden="true"></i></a>
                </div>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-xs-12">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br> -->
            <!-- <h1><strong class="acme1">ACME</strong></h1> -->
            <!-- <h3><strong  class="acme1">SI QUIERES ATRAPAR AL CORRECAMINOS, COMPRA AQUÍ</strong></h3> -->
        <!--   </div>
        </div>

              
      </div>
   </div>
    </section> -->

<section id="desc" name="desc">
        <!-- INTRO WRAP -->
        <div id="intro">
            <div class="container">
                <div class="row centered">
                  
                


                  <div class="col-xs-12 col-sm-4">
                    <div style="color: #ffffff;">
                        <span><h2 class="h2">
                            <strong>Atención</strong>
                        </h2></span>
                    </div>
                    <strong></strong>
                    <i class="fa fa-cube fa-5x"></i>
                    <h3>Mas de  <strong class="azul">10000</strong> clientes no pueden estar equivocados </h3>
                    <p style="color: #000000;">No confíes en nosotros, confía en mas<strong class="azul"> de 10000 personas conformes</strong>  de diferentes  paises.</p>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                    <div style="color: #ffffff;">
                        <span><h2 class="h2">
                            <strong>Comodidad</strong>
                        </h2></span>
                    </div>
                    <i class="fa fa-btc fa-5x" aria-hidden="true"></i>
                      <h3> <strong class="azul">Muchos metodos pago.</strong> </h3>
                      <p style="color: #000000;">Se acepta cualquier divisa e incluso <strong class="azul">BitCoins</strong>,</p>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                    <div style="color: #ffffff;">
                        <span><h2 class="h2">
                            <strong>Variedad</strong>
                        </h2></span>
                    </div>
                    <i class="fa fa-bars fa-5x"></i>
                    <h3>Mas de  <strong class="azul"> 100 categorías</strong> de productos.</h3>
                    <p style="color: #000000;"> <strong class="azul">Desde Ropa a Informatica</strong></p>
                  </div>
                </div>

                <div class="row centered">
                  
                


                  <div class="col-xs-12 col-sm-4">
                    <div style="color: #ffffff;">
                        <span><h2 class="h2">
                            <strong>Atención</strong>
                        </h2></span>
                    </div>
                    <strong></strong>
                    <i class="fa fa-cube fa-5x"></i>
                    <h3>Mas de  <strong class="azul">10000</strong> clientes no pueden estar equivocados </h3>
                    <p style="color: #000000;">No confíes en nosotros, confía en mas<strong class="azul"> de 10000 personas conformes</strong>  de diferentes  paises.</p>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                    <div style="color: #ffffff;">
                        <span><h2 class="h2">
                            <strong>Comodidad</strong>
                        </h2></span>
                    </div>
                    <i class="fa fa-btc fa-5x" aria-hidden="true"></i>
                      <h3> <strong class="azul">Muchos metodos pago.</strong> </h3>
                      <p style="color: #000000;">Se acepta cualquier divisa e incluso <strong class="azul">BitCoins</strong>,</p>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                    <div style="color: #ffffff;">
                        <span><h2 class="h2">
                            <strong>Variedad</strong>
                        </h2></span>
                    </div>
                    <i class="fa fa-bars fa-5x"></i>
                    <h3>Mas de  <strong class="azul"> 100 categorías</strong> de productos.</h3>
                    <p style="color: #000000;"> <strong class="azul">Desde Ropa a Informatica</strong></p>
                  </div>
                </div>

                <div class="row centered"></div>
            </div> <!--/ .container -->
        </div><!--/ #introwrap -->
    </section>
    
   {{--  <section id="showcase" name="showcase">
        <div id="showcase">
            <div class="container">
                <div class="row">
                    <h1 class="centered">{{ trans('adminlte_lang::message.screenshots') }}</h1>
                    <br>
                    <div class="col-lg-8 col-lg-offset-2">
                        <div id="carousel-example-generic" class="carousel slide">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{{ asset('/img/item-01.png') }}" alt="">
                                </div>
                                <div class="item">
                                    <img src="{{ asset('/img/item-02.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <br>
                <br>
                <br>
            </div><!-- /container -->
        </div>
    </section> --}}

    <section id="contact" name="contact" >

        <div id="footerwrap" >

            <div class="container-fluid ">
                <div class="col-lg-2">
                    <h3><strong>{{ trans('adminlte_lang::message.address') }}</strong></h3>
                    <p>
                        Urb. Bellamar S/N,<br/>
                        Nuevo Chimbote,<br/>
                        0051<br/>
                        Perú
                    </p>
                </div>

                <div class="col-lg-7">
                    <h3><strong>{{ trans('adminlte_lang::message.dropus') }}</strong></h3>
                    <br>
                    <form role="form" action="{{url('/')}}" method="POST" enctype="plain" id="GuardarMensaje">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name1">{{ trans('adminlte_lang::message.yourname') }}</label>
                            <input type="nombres" name="nombres" class="form-control" id="name1" placeholder="{{ trans('adminlte_lang::message.yourname') }}">
                        </div>
                        <div class="form-group">
                            <label for="email1">{{ trans('adminlte_lang::message.emailaddress') }}</label>
                            <input type="email" name="correo_electronico" class="form-control" id="correo_electronico" placeholder="{{ trans('adminlte_lang::message.enteremail') }}">
                        </div>
                        <div class="form-group">
                            <label>{{ trans('adminlte_lang::message.yourtext') }}</label>
                            <textarea class="form-control" name="mensaje" id="mensaje" rows="3"></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-large btn-success" style="background-color: #009688; border: #009688;">{{ trans('adminlte_lang::message.submit') }}</button>
                    </form>
                </div>
                <div class="col-lg-3">
                    <br>
                    <br>
                    <img src="/img/emailcall.jpg" class="img img-responsive" style="margin:0 auto; border: solid 5px white;" alt="Contáctanos">
                </div>
            </div>
        </div>
    </section>
    <footer>
            <div class="container-fluid centered" style="background-color: #B3E5FC;" >
                <div itemscope itemtype="https://schema.org/FollowAction"  style="background-color: #B3E5FC;">
                <a class="sociales" href="http://www.gooogle.com" target="_blank" title="Facebook" itemprop="followee"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
                <a  class="sociales" href="http://www.gooogle.com" target="_blank" title="Twitter" itemprop="followee"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>
                <a class="sociales" href="http://www.gooogle.com" target="_blank" title ="YouTube" itemprop="followee"><i class="fa fa-youtube-square fa-3x" aria-hidden="true"></i></a>
                </div>
            </div>
    </footer>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ url (mix('/js/app-landing.js')) }}"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
