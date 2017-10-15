<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitacao_Servico extends Model
{
       public $timestamps = true;
       protected $fillable =[
        'protocolo','anexos','observacao','idServico','idTipo_requisicao','idLocal'
    ];
}
 