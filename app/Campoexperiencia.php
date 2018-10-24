<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campoexperiencia extends Model
{
    protected $fillable = ['descricao'];
    
        public function planos() {
			return $this->hasMany(Plano::class);
    }
}
