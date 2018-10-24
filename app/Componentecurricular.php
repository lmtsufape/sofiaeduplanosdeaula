<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Componentecurricular extends Model
{
    protected $filleable = ['descricao', 'areaconhecimento_id'];
    
    public function areaconhecimento() {
		return $this->belongsTo(Areaconhecimento::class);    
    }
    
    public function planos() {
		return $this->hasMany(\App\Plano::class);    
    }
}
