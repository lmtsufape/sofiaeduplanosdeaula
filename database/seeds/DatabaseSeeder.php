<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(Campoexperiencia::class);
         $this->call(Areaconhecimento::class);
         $this->call(Componentecurricular::class);
         $this->call(Unidadetematica::class);
         $this->call(UserSeeder::class);
    }
}
