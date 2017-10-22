<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model {

    public $timestamps = false;
    protected $primaryKey = 'idServico';

    public function secretarias() {
        return $this->belongsTo('App\Secretaria');
    }

    public function solicitacao__servicos() {
        return $this->hasMany('App\Solicitacao_Servico');
    }

}
