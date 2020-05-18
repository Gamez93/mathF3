<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'video';

    protected $fillable = ['id','unidad_id','descripcion','URL','estado'];

    //relacion con tabla Unidad (Padre)
    public function unidad()
      {
          return $this->belongsTo('App\Unidad','unidad_id');
      }
}
