<?php

use Illuminate\Database\Seeder;

class Areaconhecimento extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new \App\Areaconhecimento(["descricao" => "Linguagens"]))->save();
        (new \App\Areaconhecimento(["descricao" => "Matemática"]))->save();
        (new \App\Areaconhecimento(["descricao" => "Ciências da Natureza"]))->save();
        (new \App\Areaconhecimento(["descricao" => "Ciências Humanas"]))->save();
        (new \App\Areaconhecimento(["descricao" => "Ensino Religioso"]))->save();
    }
}
