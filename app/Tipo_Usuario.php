<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Usuario extends Model {

    public $timestamps = false;
     protected $primaryKey = 'idTipo_usuarios';
    public function users() {
        return $this->hasMany('App\User');
    }

}
