<?php

use Illuminate\Database\Seeder;

class Campoexperiencia extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\Campoexperiencia(["descricao" => "O eu, o outro e o nós"]))->save();
        (new \App\Campoexperiencia(["descricao" => "Corpo, gestos e movimentos"]))->save();
        (new \App\Campoexperiencia(["descricao" => "Traços, sons, cores e formas"]))->save();
        (new \App\Campoexperiencia(["descricao" => "Escuta, fala, pensamento e imaginação"]))->save();
        (new \App\Campoexperiencia(["descricao" => "Espaços, tempos, quantidades, relações e transformações"]))->save();
    }
}
