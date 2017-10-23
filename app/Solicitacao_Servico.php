<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Solicitacao_Servico extends Model {

    public $timestamps = true;
    protected $fillable = [
        'protocolo', 'anexos', 'observacao', 'idServico', 'idTipo_requisicao', 'idLocal'
    ];

    public function local() {
        return $this->belongsTo('App\Local','idLocal');
    }

    public function tipo__requisicao() {
        return $this->belongsTo('App\Tipo_Requisicao','idTipo_requisicao');
    }

    public function servicos() {
        return $this->belongsTo('App\Servico','idServico');
    }

    public function users() {
        return $this->belongsTo('App\User','idUsuario');
    }
    public function secretarias(){
        $teste = DB::select('SELECT secretarias.descricao FROM secretarias'
                            . ' INNER JOIN servicos ON secretarias.idSecretaria = servicos.idSecretaria'
                            . ' INNER JOIN solicitacao__servicos ON servicos.idServico = solicitacao__servicos.idServico'
                            . ' WHERE solicitacao__servicos.idSolicitacao_Servicos = (SELECT MAX(idSolicitacao_Servicos) from solicitacao__servicos)');
            foreach($teste as $s):
                return $s;
            endforeach;
            
            
           
    }
 

}
