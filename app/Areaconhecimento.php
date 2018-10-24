<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Areaconhecimento extends Model
{
    protected $filleable = ["descricao"];
    
    public function planos() {
			return $this->hasMany(\App\Plano::class);    
    }
}
