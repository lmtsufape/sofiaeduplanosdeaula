<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PlanoController extends Controller
{

	public function __construct () {
	}
    public function create() {
    	$campos = \App\Campoexperiencia::all();
    	$areas = \App\Areaconhecimento::all();
    	$componentes = \App\Componentecurricular::all();
    	$unidades = \App\Areatematica::all();

		return view("novoPlano", [
				"campos"=> $campos,
				"areas" => $areas,
				"componentes" => $componentes,
				"unidades" => $unidades,

		]);

    }

		public function edit(Request $request) {
			$plano = \App\Plano::find($request->id);
    	$campoExperiencia = \App\Campoexperiencia::where('id', '=', $plano->campoexperiencia_id)->first();
			$areaTematica = \App\Areatematica::where('id', '=', $plano->areatematica_id)->first();
			//return $areaTematica->id;
			$componenteCurricular = \App\Componentecurricular::where('id', '=', $plano->componentecurricular_id)->first();
			$areaConhecimento = \App\Areaconhecimento::where('id', '=', $plano->areaconhecimento_id)->first();
			$arquivo = $plano->arquivo;

			$campos = \App\Campoexperiencia::all();
    	$areas = \App\Areaconhecimento::all();
    	$componentes = \App\Componentecurricular::all();
    	$unidades = \App\Areatematica::all();

		return view("editarPlano", [
				"plano" => $plano,
				"campoExperiencia" => $campoExperiencia,
				"areaTematica" => $areaTematica,
				"componenteCurricular" => $componenteCurricular,
				"areaConhecimento" => $areaConhecimento,
				"arquivo" => $arquivo,
				"campos"=> $campos,
				"areas" => $areas,
				"componentes" => $componentes,
				"unidades" => $unidades,

		]);

    }

    public function main() {
	    return view('main');
    }

    public function store(Request $request) {

     	if($request->hasFile('file') && $request->file('file')->isValid()) {
    		//$upload = $request->file('file')->store('planos');

    		$dados = $request->all();
    	//	$dados['arquivo'] = $upload;

    		$name = uniqid(date('HisYmd'));
    		$extension = $request->file->extension();
         $nameFile = "{$name}.{$extension}";
    		$upload = $request->file->storeAs('planos', $nameFile);


 			$plano = new \App\Plano($request->all());
 			$plano->arquivo = $nameFile;

			if($user = Auth::user()) {
				$plano->user_id = Auth::user()->id;
			 }

 			if(isset($request->campoexperiencia_id) && $request->campoexperiencia_id != 0)
 				$plano ->campoexperiencia_id = $request->campoexperiencia_id;

 			if(isset($request->areaconhecimento_id) && $request->areaconhecimento_id != 0)
 				$plano ->areaconhecimento_id = $request->areaconhecimento_id;

 			if(isset($request->componentecurricular_id) && $request->componentecurricular_id != 0)
 				$plano ->componentecurricular_id = $request->componentecurricular_id;

 			if(isset($request->areatematica_id) && $request->areatematica_id != 0)
 				$plano ->areatematica_id = $request->areatematica_id;

			$plano->verificado = false;
 			$plano->save();

			session()->flash('success', 'Plano cadastrado com sucesso.');
 			return redirect()->back();
    	} else {
				session()->flash('fail', 'Arquivo inválido');
				return redirect()->back();
		}
    }

    public function listar(Request $request) {
		$planos = \App\Plano::paginate(9);
		return view("listarPlanos", ["planos" => $planos]);
    }

    public function listarCampo(Request $request){
		$planos = \App\Plano::where([['nivel', '=', 1], ['campoexperiencia_id', '=', $request->id]])
													->where('verificado', '=', true)
													->paginate(9);
		return view("listarPlanos", ["planos" => $planos]);
    }

    public function listarUnidade(Request $request){
		$planos = \App\Plano::where([['nivel', '=', 2], ['areatematica_id', '=', $request->id]])
													->where('verificado', '=', true)
													->paginate(9);
		return view("listarPlanos", ["planos" => $planos]);
    }

    public function busca(Request $request){
		$planos = \App\Plano::where('software', 'ilike', '%' . $request->termo . '%')
													->where('verificado', '=', true)
													->paginate(9);
		return view("listarPlanos", ["planos" => $planos]);
    }

	 public function exibir(Request $request) {
		$plano = \App\Plano::find($request->id);
		if(isset($plano->fonte)) {
			if(!substr( $plano->fonte , 0, 7 ) === "http://")
				$plano->fonte = "http://" . $plano->fonte;
		}
		return view("exibirPlano", ["plano" => $plano]);
    }

		public function editarPlano(Request $request){
			$plano = \App\Plano::find($request->id);

			if($request->hasFile('file')  && $request->file('file')->isValid()){
				$name = uniqid(date('HisYmd'));
    		$extension = $request->file->extension();
        $nameFile = "{$name}.{$extension}";
    		$upload = $request->file->storeAs('planos', $nameFile);

 				$plano->arquivo = $nameFile;
			}
			if($request->hasFile('file')  && !($request->file('file')->isValid())) {
				session()->flash('fail', 'Arquivo inválido');
				return redirect()->back();
			}
			$plano->software = $request->software;
			$plano->autores = $request->autores;
			$plano->contato = $request->contato;
			$plano->fonte = $request->fonte;
			$plano->nivel = $request->nivel;

			if($user = Auth::user()) {
				$plano->user_id = Auth::user()->id;
			 }

 			if(isset($request->campoexperiencia_id) && $request->campoexperiencia_id != 0)
 				$plano ->campoexperiencia_id = $request->campoexperiencia_id;

 			if(isset($request->areaconhecimento_id) && $request->areaconhecimento_id != 0)
 				$plano ->areaconhecimento_id = $request->areaconhecimento_id;

 			if(isset($request->componentecurricular_id) && $request->componentecurricular_id != 0)
 				$plano ->componentecurricular_id = $request->componentecurricular_id;

 			if(isset($request->areatematica_id) && $request->areatematica_id != 0)
 				$plano ->areatematica_id = $request->areatematica_id;

			$plano->verificado = false;
 			$plano->save();

			session()->flash('success', 'Plano alterado com sucesso.');
 			return view("exibirPlano", ["plano" => $plano]);

		}

		public function removerPlano(Request $request){
			$plano = \App\Plano::find($request->id);
			$plano->delete();
			session()->flash('success', 'Plano deletado com sucesso.');
			return redirect()->route('/plano/new');
		}

		public function listarUser(){
				$usuarioId = Auth::user()->id;
				$planos = \App\Plano::where('user_id', '=', $usuarioId)->paginate(9);

				return view("listarPlanos", ["planos" => $planos]);
		}

		public function listarNaoVerificados(){
				$planos = \App\Plano::where('verificado', '=', false)->paginate(9);

				return view("listarPlanos", ["planos" => $planos]);
		}

		public function verificarPlano(Request $request){
				$plano = \App\Plano::find($request->id);
				$plano->verificado = true;
				$plano->save();

				session()->flash('success', 'Plano verificado com sucesso');
				return redirect()->back();
		}

}
