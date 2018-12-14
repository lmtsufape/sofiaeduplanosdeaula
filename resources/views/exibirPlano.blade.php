@extends('layouts.app')

@section('content')

<script language= 'javascript'>

function avisoDeletar(){
  if(confirm (' Deseja realmente excluir este plano? ')) {
    location.href="/plano/remover/{{$plano->id}}";
  }
  else {
    return false;
  }
}

function avisoVerificar(){
  if(confirm (' Deseja realmente verificar este plano? ')) {
    location.href="/plano/verificar/{{$plano->id}}";
  }
  else {
    return false;
  }
}


</script>

<div id="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Plano de Aula: </div>
                @if(session('success'))
                <div class="alert alert-success">
                  <p>{{session('success')}}</p>
                </div>
              @endif
              @if(session('fail'))
              <div class="alert alert-danger">
                <p>{{session('fail')}}</p>
              </div>
            @endif

                <div class="panel-body">
<form class="form-horizontal">

							<div class="form-group">
    							<label class="control-label col-sm-3" for="titulo">Software:</label>
    							<div class="col-sm-9">
      							<p class="form-control-static">{{ $plano->software }}</p>
    							</div>
							</div>
							<div class="form-group">
    							<label class="control-label col-sm-3" for="autores">Autores:</label>
    							<div class="col-sm-9">
      							<p class="form-control-static">{{ $plano->autores }}</p>
    							</div>
							</div>

							<div class="form-group">
    							<label class="control-label col-sm-3" for="contato">Contato:</label>
    							<div class="col-sm-9">
      							<p class="form-control-static">{{ $plano->contato }}</p>
    							</div>
							</div>
							<div class="form-group">
    							<label class="control-label col-sm-3" for="fonte">Fonte:</label>
    							<div class="col-sm-9">
      							<p class="form-control-static">@isset($plano->fonte)<a href="{{ $plano->fonte }}" target="_new">{{ $plano->fonte }}</a>@endisset</p>
    							</div>
							</div>


							@if($plano->nivel == 1)
							<div class="form-group">
    							<label class="control-label col-sm-3" for="nivel">Nível:</label>
    							<div class="col-sm-9">
									<p class="form-control-static">Educação Infantil</p>
    							</div>
							</div>
							<div class="form-group">
    							<label class="control-label col-sm-3" for="serie">Campo de Experiência:</label>
    							<div class="col-sm-9">
   								<p class="form-control-static">{{ $plano->campoexperiencia->descricao }}</p>
    							</div>
							</div>
							@else
							<div class="form-group">
    							<label class="control-label col-sm-3" for="nivel">Nível:</label>
    							<div class="col-sm-9">
									<p class="form-control-static">Ensino Fundamental</p>
    							</div>
							</div>
							<div class="form-group">
    							<label class="control-label col-sm-3" for="conteudos">Área do Conhecimento:</label>
    							<div class="col-sm-9">
    								<p class="form-control-static">{{ $plano->areaconhecimento->descricao }}</p>
    							</div>
							</div>
							<div class="form-group">
    							<label class="control-label col-sm-3" for="tema">Componente Curricular:</label>
    							<div class="col-sm-9">
    								<p class="form-control-static">{{ $plano->componentecurricular->descricao }}</p>
    							</div>
							</div>
							<div class="form-group">
    							<label class="control-label col-sm-3" for="objetivos">Unidade Temática:</label>
    							<div class="col-sm-9">
									<p class="form-control-static">{{ $plano->areatematica->descricao }}</p>
    							</div>
							</div>
							@endif
							<div class="form-group">
    							<label class="control-label col-sm-3" for="objetivos">Arquivo:</label>
    							<div class="col-sm-9">
									<p class="form-control-static"><a href="{{ route('/download/planos', ['file' => $plano->arquivo])}}" target="_new">Download</a></p>
    							</div>
							</div>

              <div class="form-group">
                @if (Auth::guard()->check())<!-- editar -->
                <div class="control-label col-sm-3">
                    <a class="right waves-effect waves-teal darken-4 btn-flat" href="/plano/editarPlano/{{$plano->id}}">
                        <b>Editar</b> <i class="material-icons right">edit</i>
                      </a>
                    </div>
                @endif
              </div>

              <div class="form-group">
                @if (Auth::guard()->check())<!-- deletar -->
                <div class="control-label col-sm-3">
                    <!--<a class="right waves-effect waves-teal darken-4 btn-flat" href="/plano/remover/{{$plano->id}}" > -->
                        <a class="right waves-effect waves-teal darken-4 btn-flat" onClick="avisoDeletar();"><b>Deletar</b> <i class="material-icons right">delete</i></a>
                      </a>
                    </div>
                @endif
              </div>

              <div class="form-group">
                @if (Auth::guard()->check() && $plano->verificado == false)<!-- verificar -->
                <div class="control-label col-sm-3">
                    <!-- <a class="right waves-effect waves-teal darken-4 btn-flat" href="/plano/verificar/{{$plano->id}}"> -->
                        <a class="right waves-effect waves-teal darken-4 btn-flat" onClick="avisoVerificar();"><b>Verificar</b> <i class="material-icons right">check</i></a>
                      </a>
                    </div>
                @endif
              </div>

	</form>

					 </div>
            </div>
        </div>
    </div>
</div>

@endsection
