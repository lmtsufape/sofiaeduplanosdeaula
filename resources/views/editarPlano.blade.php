@extends('layouts.app')

@section('content')

<script type="text/javascript" >
//<![CDATA[
var componentes = {!! json_encode($componentes) !!};
var unidades = {!! json_encode($unidades) !!};
var nivelSelecionado = {!! $plano->nivel !!};
var areaSelecionada = {!! $areaTematica->id !!};
var componenteSelecionado = {!! $componenteCurricular->id !!};
var unidadeSelecionada = {!! $areaConhecimento->id !!};

function selecionar () {
	var nivelObj = document.getElementById("nivel");
	nivelObj.selectedIndex = nivelSelecionado;
	nivelChange(nivelObj);

	var areaObj = document.getElementById("areas");
	for (var i=0; i<areaObj.length; i++) {
			if(areaObj.options[i].value == areaSelecionada) {
				areaObj.selectedIndex = i;
				break;
			}
	}
	areaChange(areaObj);

	var compObj = document.getElementById("componente");
	for (var i=0; i<compObj.length; i++) {
			if(compObj.options[i].value == componenteSelecionado) {
				compObj.selectedIndex = i;
				break;
			}
	}
	componenteChange(compObj);

	var unidadeObj = document.getElementById("unidade");
	for (var i=0; i<unidadeObj.length; i++) {
			if(unidadeObj.options[i].value == unidadeSelecionada) {
				unidadeObj.selectedIndex = i;
				break;
			}
	}
}

function nivelChange(selectObj) {
	// get the index of the selected option
	var idx = selectObj.selectedIndex;
	// get the value of the selected option
	var which = selectObj.options[idx].value;

  	var grupo_infantil = document.getElementById("grupo_infantil");
  	var grupo_fundamental = document.getElementById("grupo_fundamental");

  	switch (which) {
		case "0":
			grupo_infantil.style.display = "none";
 			grupo_fundamental.style.display = "none";
 			break;
		case "1":
			grupo_infantil.style.display = "block";
 			grupo_fundamental.style.display = "none";
 			break;
		case "2":
			grupo_infantil.style.display = "none";
 			grupo_fundamental.style.display = "block";
 			break;
 	}
}


function areaChange(selectObj) {
	var idx = selectObj.selectedIndex;
	var which = selectObj.options[idx].value;

	var cSelect = document.getElementById("componente");

	limparSelect(cSelect, "Selecione um Componente Curricular");
	limparSelect(document.getElementById("unidade"), "Selecione uma Unidade Temática");


	for (var i=0; i<componentes.length; i++) {
		if(componentes[i].areaconhecimento_id == which) {
			newOption = document.createElement("option");
			newOption.value = componentes[i].id;
			newOption.text=componentes[i].descricao;
			try {
				cSelect.add(newOption);  // this will fail in DOM browsers but is needed for IE
			} catch (e) {
				cSelect.appendChild(newOption);
			}
		}
	}
}


function componenteChange(selectObj) {
	var idx = selectObj.selectedIndex;
	var which = selectObj.options[idx].value;

 	var cSelect = document.getElementById("unidade");

 	limparSelect(cSelect, "Selecione uma Unidade Temática");

	var newOption;
	for (var i=0; i<unidades.length; i++) {
		if(unidades[i].componentecurricular_id == which) {
			newOption = document.createElement("option");
			newOption.value = unidades[i].id;
			newOption.text=unidades[i].descricao;

			try {
				cSelect.add(newOption);  // this will fail in DOM browsers but is needed for IE
			} catch (e) {
				cSelect.appendChild(newOption);
			}
		}
	}
}


function limparSelect(cSelect, defaultText) {
 	var len=cSelect.options.length;
 	while (cSelect.options.length > 0) {
 		cSelect.remove(0);
 	}

 	var newOption = document.createElement("option");
 	newOption.value = "";
 	newOption.text= defaultText

 	try {
 		cSelect.add(newOption);  // this will fail in DOM browsers but is needed for IE
 	} catch (e) {
 		cSelect.appendChild(newOption);
	}
}



</script>
<style type="text/css">
.autocomplete {
  position: relative;
  display: inline-block;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;


  top: 97%;
  left: 20px;
  right: 0;
}

.autocomplete-items div {
  padding: 2px;
  cursor: pointer;
  background-color: #fff;
  width: 100%;
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9;
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important;
  color: #ffffff;
}

</style>
<script>
var softwares = {!! $values !!} ;
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {

      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
      x[i].parentNode.removeChild(x[i]);
    }
  }
}
/*execute a function when someone clicks in the document:*/
document.addEventListener("click", function (e) {
    closeAllLists(e.target);
});
}


</script>


<div id="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Editar Plano de Aula</strong></div>

                <div class="panel-body">
						<form action="{{ route('/plano/salvarPlano') }}" enctype="multipart/form-data" method="post" class="form-horizontal" >
							<input type="hidden" name="id" value="{{ $plano->id}}" />
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="form-group">
    							<label class="control-label col-sm-2" for="software">Software:</label>
    							<div class="col-sm-10">
      							<input type="text" class="form-control"  id="software" name="software" value="{{ $plano->software}}" placeholder="Nome do software utilizado">
      							 <script>
      							 		autocomplete(document.getElementById("software"), softwares);
      							 </script>
      						</div>
							</div>
							<div class="form-group">
    							<label class="control-label col-sm-2" for="autores">Autores:</label>
    							<div class="col-sm-10">
      							<input type="text" class="form-control" id="autores" name="autores" value="{{ $plano->autores}}" placeholder="Nome do(s) autor(es)">
    							</div>
							</div>
							<div class="form-group">
    							<label class="control-label col-sm-2" for="contato">Contato:</label>
    							<div class="col-sm-10">
      							<input type="text" class="form-control" id="contato" name="contato" value="{{ $plano->contato}}" placeholder="Contato do(s) autor(es)">
    							</div>
							</div>
							<div class="form-group">
    							<label class="control-label col-sm-2" for="fonte">Fonte:</label>
    							<div class="col-sm-10">
      							<input type="text" class="form-control" id="fonte" name="fonte" value="{{ $plano->fonte}}" placeholder="URL do plano de aula no site do autor (se houver)">
    							</div>
							</div>
							<div class="form-group">
    							<label class="control-label col-sm-2" for="nivel">Nível:</label>
    							<div class="col-sm-10">
									<select class="form-control" id="nivel" name="nivel" onchange="nivelChange(this);">
											<option value="0">Selecione um nível de Ensino</option>
											<option value="1" @if($plano->nivel != NULL && $plano->nivel == 1) selected="selected" @endif> Educação Infantil </option>
											<option value="2" @if($plano->nivel != NULL && $plano->nivel == 2) selected="selected" @endif> Ensino Fundamental </option>
									</select>
    							</div>
							</div>
							<div id="grupo_infantil">
							<div class="form-group">
    							<label class="control-label col-sm-2" for="campos">Campo de Experiência:</label>
    							<div class="col-sm-10">
      							<select class="form-control" id="campos" name="campoexperiencia_id" >
      								<option value="0">Selecione um Campo de Experiência</option>
											@foreach($campos as $campo)
												<option value="{{$campo->id}}" @if($campoExperiencia != NULL && $campoExperiencia->id == $campo->id) selected="selected" @endif> {{$campo->descricao}} </option>
      								@endforeach
      							</select>

    							</div>
							</div>
							</div>
							<div id="grupo_fundamental">
							<div class="form-group">
    							<label class="control-label col-sm-2" for="areas">Área do Conhecimento</label>
    							<div class="col-sm-10">
      							<select class="form-control" id="areas" name="areaconhecimento_id" onchange="areaChange(this);">
      								<option value="0">Selecione uma Área do Conhecimento</option>
      								@foreach($areas as $area)
      									<option value="{{$area->id}}" @if($areaConhecimento != NULL && $areaConhecimento->id == $area->id) selected="selected" @endif> {{$area->descricao}} </option>
      								@endforeach

      							</select>

    							</div>
							</div>
							<div class="form-group">
    							<label class="control-label col-sm-2" for="componente">Componente Curricular:</label>
    							<div class="col-sm-10">
    								<select class="form-control" id="componente" name="componentecurricular_id" onchange="componenteChange(this);">
      								<option value="">Selecione um Componente Curricular</option>
											@if($componenteCurricular != NULL)
											<option value="{{$componenteCurricular->descricao}}" selected>{{$componenteCurricular->descricao}}</option>
											@endif
      							</select>
    							</div>
							</div>
							<div class="form-group">
    							<label class="control-label col-sm-2" for="unidade">Unidade Temática:</label>
    							<div class="col-sm-10">
      							<select class="form-control" id="unidade" name="areatematica_id" >
      								<option value="">Selecione uma Unidade Temática</option>
											@if($areaTematica != NULL)
											<option value="{{$areaTematica->descricao}}" selected>{{$areaTematica->descricao}}</option>
											@endif
      							</select>
    							</div>
							</div>
							</div>
							<div class="form-group">
    							<label class="control-label col-sm-2" for="arquivo">Arquivo:</label>
    							<div class="col-sm-10">
										Se deseja alterar o arquivo enviado anteriormente, selecione um novo. Caso não, o arquivo anterior permanecerá.
										<input type="file" class="form-control-file" id="arquivo" name="file" placeholder="Selecione um arquivo">
    							</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-default">Editar</button>
								</div>
							</div>
						</form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
	selecionar();
</script>
@endsection
