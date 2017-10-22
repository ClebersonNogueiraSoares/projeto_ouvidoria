<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model {

    public $timestamps = false;
    protected $primaryKey = 'idSecretaria';

    public function servicos() {
        return $this->hasMany('App\Servico');
    }
    

}
