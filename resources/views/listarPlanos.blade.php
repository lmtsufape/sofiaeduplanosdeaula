@extends('layouts.app')

@section('content')
<div id="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Listar Planos de Aula</div>
			
              
                <div class="panel-body container-fluid bg-3 text-center">
                	<div class="row">
                			@foreach($planos as $plano)
                			<div class="col-sm-3 folha">
                				<p class="titulo">{{ $plano->software }}</p>
                				<hr class='separador'>
                				@if($plano->nivel == 1)
                					<p>Educação Infantil<br>
                					<strong>{{ $plano->campoexperiencia->descricao}}</strong></p>
                				@elseif($plano->nivel == 2)
                					<p>Ensino Fundamental<br>
                					<strong>{{ $plano->componentecurricular->descricao}} - {{ $plano->areatematica->descricao}}</strong></p>
                				@endif
                				<p class="autores">Por: <strong>{{ $plano->autores }}</strong></p>
                				<a href="{{ route('/plano/show', ['id' => $plano->id])}}">Ver mais detalhes</a> ::
                				<a href="{{ route('/download/planos', ['file' => $plano->arquivo])}}" target="_new">Download</a>
                			</div>
                			@endforeach
                	</div>
                </div>	
                
            </div>
        </div>
    </div>
</div>
@endsection
