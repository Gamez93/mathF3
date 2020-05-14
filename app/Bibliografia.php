<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bibliografia extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'bibliografia';

  protected $fillable = ['id','materia_id','descripcion','URL','estado'];

  public function materia()
    {
        return $this->belongsTo('App\Materia','materia_id');
    }
}
