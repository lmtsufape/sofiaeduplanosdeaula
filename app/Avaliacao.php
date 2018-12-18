<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
  protected $filleable = ['nota', 'comentario', 'aprovado', 'plano_id'];

  public function plano() {
    return $this->belongsTo(Plano::class);
  }
}
