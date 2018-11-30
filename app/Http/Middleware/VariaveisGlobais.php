<?php

namespace App\Http\Middleware;

use Closure;

class VariaveisGlobais
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

      $camposMenu = \App\Campoexperiencia::withCount(['planos' => function ($query){
				$query->where('nivel', '=', '1')->where('verificado', '=', true);
      }])->get();

      $areasMenu = \App\Areaconhecimento::withCount(['planos' => function ($query){
				$query->where('nivel', '=', '2')->where('verificado', '=', true);
      }])->get();

      $componentesMenu = \App\Componentecurricular::withCount(['planos' => function ($query){
				$query->where('nivel', '=', '2')->where('verificado', '=', true);
      }])->get();

		$unidadesMenu = \App\Areatematica::withCount(['planos' => function ($query){
				$query->where('nivel', '=', '2')->where('verificado', '=', true);      
      }])->get();

      $a = \App\Plano::select("software")->distinct()->get();


   // 	return "";
    	\View::share('camposMenu', $camposMenu);
    	\View::share('areasMenu', $areasMenu);
    	\View::share('componentesMenu', $componentesMenu);
    	\View::share('unidadesMenu', $unidadesMenu);

    	\View::share('values',json_encode($a));
        return $next($request);
    }
}
