<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<style type="text/css">
#grupo_infantil {
	display: none;
}
#grupo_fundamental {
	display: none;
}
#container{
	margin-top: 70px;
}

body{
	background-attachment: fixed;
   background-size:cover;
   background-repeat:no-repeat;
   color: #0b3c54;
   background-image:url("{{asset('images/background3.png')}}");

}

.panel-body {
	background-color: rgba(240,240,240, 0.5);
}

div.panel {
	background: none;
}

.panel-default > .panel-heading {
	color: #fff;
	background-color: #333;
	border-color: #d3e0e9;
}

.navbar-default {
	background-color: #333;
	border-color: #d3e0e9;
}

.navbar-default .navbar-nav > li > a, .navbar-default .navbar-nav > li > a:focus, .navbar-default .navbar-nav > li > a:hover {
	color: #fff;
	background-color: transparent;
  font-size: 13px;
}

.navbar-default .navbar-brand, .navbar-default .navbar-brand:hover {
	color: #fff;
	background-color: transparent;
}

.folha {
    margin: 20px 40px 20px 40px;
    min-height: 195px;
    padding: 5px;
    background: #fff;
    border-radius: 6px;
    box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, .64)

}
.titulo {
	font-size: 2em;
	font-weight: bold;
	margin-bottom: 0px;
}
.autores {
	text-align: left;
}
hr.separador {
	margin-top: 0px;
	margin-bottom: 0px;
}
</style>

<style>

.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
@font-face {
    font-family: 'Material Icons';
    font-style: normal;
    font-weight: 400;
    src: local('Material Icons'), local('MaterialIcons-Regular'), url(https://fonts.gstatic.com/s/materialicons/v18/2fcrYFNaTjcS6g4U3t-Y5ZjZjT5FdEJ140U2DJYC3mY.woff2) format('woff2');
}

.material-icons {
    font-family: 'Material Icons';
    font-weight: normal;
    font-style: normal;
    font-size: 24px;
    line-height: 1;
    letter-spacing: normal;
    text-transform: none;
    display: inline-block;
    white-space: nowrap;
    word-wrap: normal;
    direction: ltr;
    -moz-font-feature-settings: 'liga';
    -moz-osx-font-smoothing: grayscale;
}

</style>

</head>
<body>
  <!-- barra brasil-->
  <div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;">
  <ul id="menu-barra-temp" style="list-style:none;">
    <li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED">
        <a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo Brasileiro</a>
    </li>
    <li>
       <a style="font-family:sans,sans-serif; text-decoration:none; color:white;" href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a>
    </li>
  </ul>
</div>

<!-- barra de logos-->
<div id="barra-logos" style="background:#FFFFFF; margin-top: 1px; height: 100px; padding: 10px 0 10px 0">
  <ul id="logos" style="list-style:none;">
    <li style="margin-right:140px; margin-left:110px; border-right:1px">
      <a href="{{ route('inicio') }}"><img src="{{asset('images/sofiaedu.png')}}"  height="80" width="240"></a>
      <a href="http://lmts.uag.ufrpe.br/"><img src="{{asset('images/lmts2.png')}}" style = "margin-left: 15px; margin-top:10px " height="70" width="60"align = "right" ></a>

      <img src="{{asset('images/separador.png')}}" style = "margin-left: 15px" height="80" align = "right" >
      <a href="http://ww3.uag.ufrpe.br/"><img src="{{asset('images/uag.png')}}" style = "margin-left: 10px" height="80" width="70" align = "right" ></a>

      <img src="{{asset('images/separador.png')}}" style = "margin-left: 15px" height="80" align = "right" >
      <a href="http://www.ufrpe.br/"><img src="{{asset('images/ufrpe.png')}}" style = "margin-left: 15px; margin-right: -10px " height="80" width="70" align = "right"></a>
    </li>


  </ul>
</div>

<!-- barra de menu -->
<div id="app">
<div class="navbar navbar-default" role="navigation">
    <div class="container col-md-10 col-md-offset-1">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--<a class="navbar-brand" href="{{ route('inicio') }}">Planos de Aula</a>-->
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                        	<li><form action="{{ route('/plano/busca') }}" method="post" >
                        	  {{ csrf_field() }}
                        	<input type="text" name="termo" class="form-control" style="margin-top: 7px;" placeholder="Busca por software"> </form></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <!--<li><a href="{{ route('register') }}">Register</a></li>-->
                        @else
                        <li><form action="{{ route('/plano/busca') }}" method="post" >
                          {{ csrf_field() }}
                        <input type="text" name="termo" class="form-control" style="margin-top: 5px;" placeholder="Busca por software"> </form></li>
                        	<!--<li>{{ Auth::user()->name }}</li>-->
                           <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                           </li>
                           <li><a href="{{ route('register') }}">Cadastrar</a></li>
                        @endif
            </ul>
            <ul class="nav navbar-nav">
                <li> <a href="{{ route('inicio') }}">Download</a></li>
                <li ><a href="{{ route('/plano/new') }}">Enviar plano</a></li>
                @if (Auth::guard()->check())
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gerenciar<b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level">
                      <li><a href="{{ route('/plano/listaUser') }}">Meus Planos</a></li>
                      <li><a href="{{ route('/plano/listaNaoVerificados') }}">Não verificados</a></li>
                      <li><a href="{{ route('/plano/all') }}">Todos</a></li>
                    </ul>
                </li>
                @endif
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Educação Infantil<b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level">
                    @foreach ($camposMenu as $campo)
                    @if($campo->planos_count > 0)
                    	<li><a href="{{ route('/plano/campo', ['id' => $campo->id]) }}">{{$campo->descricao}} ({{$campo->planos_count}})</a></li>
                    @else
                    <li><a href="#">{{$campo->descricao}} ({{$campo->planos_count}})</a></li>
                    @endif
                    @endforeach

                    </ul>
                </li>
                 <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ensino Fundamental<b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level">
                    @foreach ($areasMenu as $area)
							<li  class="dropdown-submenu">
						  		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       {{$area->descricao}} ({{$area->planos_count}})</a>
                       <ul class="dropdown-menu">
									@foreach($componentesMenu as $componente)
										@if($componente->areaconhecimento_id == $area->id)
                                <li class="dropdown-submenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{$componente->descricao}} ({{$componente->planos_count}})</a>
                                	<ul class="dropdown-menu">
                                		@foreach($unidadesMenu as $unidade)
                                			@if($unidade->componentecurricular_id == $componente->id)
													         <li><a href="{{route ('/plano/unidade', ['id' => $unidade->id])}}">{{$unidade->descricao}} ({{$unidade->planos_count}})</a></li>
                                			@endif
                                		@endforeach
                                	</ul>
                                </li>
                              @endif
                           @endforeach
                       </ul>

                       </li>

                    @endforeach

                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
            <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <!--<li><a href="{{ route('register') }}">Register</a></li>-->
                        @else
                        	<li>{{ Auth::user()->name }}</li>
                           <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                           </li>
                        @endif
            </ul>
            <ul class="nav navbar-nav">
                <li> <a href="{{ route('inicio') }}">Download</a></li>
                <li ><a href="{{ route ('/plano/new') }}">Enviar plano</a></li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Educação Infantil<b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level">
                    @foreach ($camposMenu as $campo)
                    @if($campo->planos_count > 0)
                    	<li><a href="{{ route('/plano/campo', ['id' => $campo->id])}}">{{$campo->descricao}} ({{$campo->planos_count}})</a></li>
                    @else
                    <li><a href="#">{{$campo->descricao}} ({{$campo->planos_count}})</a></li>
                    @endif
                    @endforeach

                    </ul>
                </li>
                 <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ensino Fundamental<b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level">
                    @foreach ($areasMenu as $area)
							<li  class="dropdown-submenu">
						  		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       {{$area->descricao}} ({{$area->planos_count}})</a>
                       <ul class="dropdown-menu">
									@foreach($componentesMenu as $componente)
										@if($componente->areaconhecimento_id == $area->id)
                                <li class="dropdown-submenu">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{$componente->descricao}} ({{$componente->planos_count}})</a>
                                	<ul class="dropdown-menu">
                                		@foreach($unidadesMenu as $unidade)
                                			@if($unidade->componentecurricular_id == $componente->id)
													         <li><a href="#">{{$unidade->descricao}} ({{$unidade->planos_count}})</a></li>
                                			@endif
                                		@endforeach
                                	</ul>
                                </li>
                              @endif
                           @endforeach
                       </ul>

                       </li>
                    @endforeach

                    </ul>
                </li>

            </ul>
        </div>

      @yield('content')

<!--<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>-->
</div>
<script defer="defer" src="//barra.brasil.gov.br/barra.js" type="text/javascript"></script>
</body>
</html>
