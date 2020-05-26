<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table = 'clase';

    protected $fillable = ['id','users_id','tema','contenido'];

    public function user()
    {
        return $this->belongsTo('App\User','users_id');
    }
}
