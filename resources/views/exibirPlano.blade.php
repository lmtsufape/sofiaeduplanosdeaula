@extends('layouts.app')

@section('content')

<script language= 'javascript'>

function avisoDeletar(){
  if(confirm (' Deseja realmente excluir este plano? ')) {
    location.href="{{ route('/plano/remover', ['id' => $plano->id])}}";
  }
  else {
    return false;
  }
}

function avisoVerificar(){
  if(confirm (' Deseja realmente verificar este plano? ')) {
    location.href="{{ route('/plano/verificar', ['id' => $plano->id])}}";
  }
  else {
    return false;
  }
}

function avisoAprovarComentario(id){
  if(confirm (' Deseja realmente aprovar esta avaliação? ')) {
    location.href="/plano/comentario/aprovar/"+id;
  }
  else {
    return false;
  }
}

function avisoDeletarComentario(id){
  if(confirm (' Deseja excluir esta avaliação? ')) {
    location.href="/plano/comentario/excluir/"+id;
  }
  else {
    return false;
  }
}


</script>

<div id="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Plano de Aula:
                <?php switch ($media) {
                  case 5:
                  ?>
                  <label style="font-size: 20px; padding: 0 10px 0 0; color: #FD4;" class="star star" ></label>
                  <label style="font-size: 20px; padding: 0 10px 0 0; color: #FD4;" class="star star-4" ></label>
                  <label style="font-size: 20px; padding: 0 10px 0 0; color: #FD4;" class="star star-3" ></label>
                  <label style="font-size: 20px; padding: 0 10px 0 0; color: #FD4;" class="star star-2" ></label>
                  <label style="font-size: 20px; padding: 0 10px 0 0; color: #FD4;" class="star star-1" ></label>

                  <?php
                    break;

                  case 4:
                  ?>

                  <label style="font-size: 20px; padding: 0 10px 0 0;" class="star star" ></label>
                  <label style="font-size: 20px; padding: 0 10px 0 0; color: #FD4;" class="star star-4" ></label>
                  <label style="font-size: 20px; padding: 0 10px 0 0; color: #FD4;" class="star star-3" ></label>
                  <label style="font-size: 20px; padding: 0 10px 0 0; color: #FD4;" class="star star-2" for="star-2"></label>
                  <label style="font-size: 20px; padding: 0 10px 0 0; color: #FD4;" class="star star-1" for="star-1"></label>

                  <?php
                    break;

                  case 3:
                  ?>

                  <label style="font-size: 20px; padding: 0 10px 0 0;" class="star star" ></label>
                  <label style="font-size: 20px; padding: 0 10px 0 0;" class="star star-4" ></label>
                  <label style="font-size: 20px; padding: 0 10px 0 0; color: #FD4;" class="star star-3" ></label>
                  <label style="font-size: 20px; padding: 0 10px 0 0; color: #FD4;" class="star star-2"></label>
                  <label style="font-size: 20px; padding: 0 10px 0 0; color: #FD4;" class="star star-1"></label>

                  <?php
                    break;

                  case 2:
                  ?>

                  <label style="font-size: 20px; padding: 0 10px 0 0; " class="star star" ></label>
                  <label style="font-size: 20px; padding: 0 10px 0 0; " class="star star-4" ></label>
                  <label style="font-size: 20px; padding: 0 10px 0 0; " class="star star-3" ></label>
                  <label style="font-size: 20px; padding: 0 10px 0 0; color: #FD4;" class="star star-2"></label>
                  <label style="font-size: 20px; padding: 0 10px 0 0; color: #FD4;" class="star star-1"></label>

                  <?php
                    break;

                  case 1:
                  ?>

                  <label style="font-size: 20px; padding: 0 10px 0 0; " class="star star" for="star-5"></label>
                  <label style="font-size: 20px; padding: 0 10px 0 0; " class="star star-4" for="star-4"></label>
                  <label style="font-size: 20px; padding: 0 10px 0 0; " class="star star-3" ></label>
                  <label style="font-size: 20px; padding: 0 10px 0 0; " class="star star-2" for="star-2"></label>
                  <label style="font-size: 20px; padding: 0 10px 0 0; color: #FD4;" class="star star-1" for="star-1"></label>

                  <?php
                    break;
                }
                ?>
                </div>
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
                    <a class="right waves-effect waves-teal darken-4 btn-flat" href="{{ route('/plano/editarPlano', ['id' => $plano->id])}}">
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


              <div class="form-group">
                  <label class="control-label col-sm-3" for="nivel">Avalie este plano:</label>
                  <div class="col-sm-9">

                  </div>
              </div>
</form>
              <div class = "form-group">
              <div class="stars">
                <div class="col-sm-9">

                </div>
                <form action="{{ route('/plano/avaliar') }}"  method="post"  enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <!-- <label class="control-label col-sm-10" for="avaliacao">Avalie este plano: </label> -->
                  <div class="col-sm-12">
                    <textarea class="form-control" id="comentario" name="comentario" placeholder="Digite seu comentário" > </textarea>
                  </div>

                <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

                    <input type="hidden" name="plano_id" value="{{ $plano->id}}" />
                    <input class="star star-5" id="star-5" value="5" type="radio" name="star"/>
                    <label class="star star-5" for="star-5"></label>
                    <input class="star star-4" id="star-4" value="4" type="radio" name="star"/>
                    <label class="star star-4" for="star-4"></label>
                    <input class="star star-3" id="star-3" value="3" type="radio" name="star"/>
                    <label class="star star-3" for="star-3"></label>
                    <input class="star star-2" id="star-2" value="2" type="radio" name="star"/>
                    <label class="star star-2" for="star-2"></label>
                    <input class="star star-1" id="star-1" value="1" type="radio" name="star"/>
                    <label class="star star-1" for="star-1"></label>

                    <button style = " display:inline; " type="submit" name="action" class="btn btn-secondary pull-right">Enviar</button>

                  </form>

                  </div>
                </div>

					 </div>
            </div>
    </div>
</div>

<div id="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Avaliações: </div>
                <div class="panel-body">



                @if (sizeof($avaliacoes) == 0)
                    <label class="control-label col-sm-6" for="vazio">Ainda não há avaliações para este plano.</label>

                @else
                    <div class="form-group">
                      <label class="control-label col-sm-6" for="comentario">Comentário: </label>
                      <label class="control-label col-sm-3" for="nota">Nota: </label>
                    </div>
                    @foreach ($avaliacoes as $avaliacao)
                    @if ($avaliacao->aprovado == true)
                  <div class="form-group">
        							<label class="control-label col-sm-6" for="comentario">{{ $avaliacao->comentario }}</label>

                      <div class="col-sm-3">
          							<p class="form-control-static">{{ $avaliacao->nota }}</p>
        							</div>
    							</div>
                  @elseif($avaliacao->aprovado == false && Auth::guard()->check())
                  <div class="form-group">
        							<label class="control-label col-sm-6" for="comentario">{{ $avaliacao->comentario }}</label>

                      <div class="col-sm-1">
          							<p class="form-control-static">{{ $avaliacao->nota }}</p>
        							</div>

                      <div class="col-sm-2">
                        <a class="right waves-effect waves-teal darken-4 btn-flat" onClick="avisoAprovarComentario({{$avaliacao->id}});"><b>Aceitar</b> <i class="material-icons right">check</i></a>
                      </a>
        							</div>

                      <div class="col-sm-3">
                        <a class="right waves-effect waves-teal darken-4 btn-flat" onClick="avisoDeletarComentario({{$avaliacao->id}});"><b>Excluir</b> <i class="material-icons right">delete</i></a>
                      </a>
        							</div>

    							</div>
                  @endif
                  @endforeach
                @endif
              </div>
            </div>
          </div>
</div>

@endsection
