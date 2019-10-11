@extends('layouts.app')

@section('content')

<div id="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          	<div class="row">
          			@foreach($planos as $plano)
          			<div class="col-sm-3 folha">
          				<center><p class="titulo">{{ $plano->software }}</p></center>
          				<hr class='separador'>
          				@if($plano->nivel == 1)
          					<p><strong>Educação Infantil</strong><br>
                    @if($plano->campoexperiencia != null)
            					{{ $plano->campoexperiencia->descricao}}</p>
                    @endif
          				@elseif($plano->nivel == 2)
          					<p><strong>Ensino Fundamental</strong><br>
                    @if($plano->componentecurricular != null)
            					{{ $plano->componentecurricular->descricao}} - {{ $plano->areatematica->descricao}}</p>
                    @endif
          				@endif
                  @if($plano->autores != null)
            				<p class="autores">Autor: <strong>{{ $plano->autores }}</strong></p>
                  @endif
          				<a href="{{ route('/plano/show', ['id' => $plano->id])}}">Ver mais detalhes</a> ::
          				<a href="{{ route('/download/planos', ['file' => $plano->arquivo])}}" target="_new">Download</a>
          			</div>
          			@endforeach
          	</div>
            {{ $planos->links() }}

        </div>
    </div>
</div>
@endsection
