<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Areatematica extends Model
{
    protected $filleable = ['descricao', 'componentecurricular_id'];
    
    public function componentecurricular() {
		return $this->belongsTo(Componentecurricular::class);    
    }
    
    public function planos() {
		return $this->hasMany(\App\Plano::class);    
    }
}
