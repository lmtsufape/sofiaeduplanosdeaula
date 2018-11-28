<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $fillable = [
      'software', 'autores', 'contato', 'fonte',
    	'nivel', 'arquivo', 'verificado'
    ];

    public function user() {
    return $this->belongsTo(\App\User::class);
    }
    public function componentecurricular() {
		return $this->belongsTo(\App\Componentecurricular::class);
    }

    public function campoexperiencia() {
		return $this->belongsTo(\App\Campoexperiencia::class);
    }

    public function areatematica() {
		return $this->belongsTo(\App\Areatematica::class);
    }

    public function areaconhecimento() {
		return $this->belongsTo(\App\Areaconhecimento::class);
    }
}
