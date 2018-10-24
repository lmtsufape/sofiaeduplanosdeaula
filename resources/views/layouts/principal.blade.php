<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
<style type="text/css">
#grupo_infantil {
	display: none;
}
#grupo_fundamental {
	display: none;
}
</style> 
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
    
    
    

/* Badger
------------------------- */

[class*="badger"] {
    position: relative;
        margin: 15px 0;
    padding: 33px 15px 15px;
    background: #fff;
    border-radius: 6px;
    box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, .64)
}

[class*="badger"]:after {
    content: attr(data-badger);
    position: absolute;
    top: 0;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: bold;
    background: #999;
    color: #fff
}

.badger-left {
    border-top-left-radius: 6px
}

.badger-right {
    border-top-right-radius: 6px
}

.badger-left:after {
    left: 0;
    border-radius: 6px 0 6px 0
}

.badger-right:after {
    right: 0;
    border-radius: 0 6px 0 6px
}

.badger-danger:after {
    background: #d9534f
}

.badger-warning:after {
    background: #f0ad4e
}

.badger-success:after {
    background: #5cb85c
}

.badger-info:after {
    background: #5bc0de
}

.badger-inverse:after {
    background: #222
}  

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
  
</style>

</head>
<body>

<div >
  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Planos de Aula</a>
        </div>
        <div class="collapse navbar-collapse">        
        
        
        <script src="{{ asset('js/app.js') }}"></script>
            <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
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
                <li ><a href="/plano/new">Novo</a></li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Educação Infantil<b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level">
                    @foreach ($camposMenu as $campo)
                    @if($campo->planos_count > 0)
                    	<li><a href="/plano/campo/{{$campo->id}}">{{$campo->descricao}} ({{$campo->planos_count}})</a></li>
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
        
         <div class="col-sm-12">
         <div class="badger-left" data-badger="Badger default (left)">Block with badger 1</div>
        <div class="badger-right badger-info" data-badger="Badger info (right)">Block with badger 2</div>
        <div class="badger-left badger-danger" data-badger="Badger danger (left)">Block with badger 3</div>
        <div class="badger-right badger-warning" data-badger="Badger warning (right)">Block with badger 4</div>
        <div class="badger-left badger-success" data-badger="Badger success (left)">Block with badger 5</div>
        <div class="badger-right badger-inverse" data-badger="Badger inverse (right)">Block with badger 6</div>
         	
        			<div>@yield('content')</div>
        			
        			 
    			    
    		</div>
        
    </div>
</div>
    

</body>
</html>
