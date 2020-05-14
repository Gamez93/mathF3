<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'materia';

  protected $fillable = ['id','codigo_materia','nombre','descripcion','objetivo_general','estado','seleccion'];

  /*Relacion de MAteria con Bibliografias*/
  public function bibliografias()
    {
        return $this->hasMany('App\Bibliografia','materia_id');
    }

  /*Relacion de MAteria con Bibliografias*/
  public function unidades()
    {
        return $this->hasMany('App\Unidad','materia_id');
    }
}
