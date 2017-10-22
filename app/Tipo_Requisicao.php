<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Requisicao extends Model {

    protected $table = 'tipo__requisicao';
    public $timestamps = false;
    protected $primaryKey = 'idTipo_requisicao';

    public function solicitacao__servicos() {
        return $this->hasMany('App\Solicitacao_Servico');
    }

}
