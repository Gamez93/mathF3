<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'unidad';

  protected $fillable = ['id','materia_id','nombre','descripcion','objetivo'];

  //relacion con tabla Materia (Padre)
  public function materia()
    {
        return $this->belongsTo('App\Materia','materia_id');
    }

  /*Relacion de MAteria con Bibliografias*/
  public function videos()
    {
          return $this->hasMany('App\Video','unidad_id');
    }
}
