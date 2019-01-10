@extends('layouts.app')

@section('content')

<script language= 'javascript'>

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
