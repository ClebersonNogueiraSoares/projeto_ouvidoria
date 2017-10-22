<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model {

    protected $table = 'local';
    public $timestamps = false;
    protected $fillable =[
        'rua','num','descricao_local','place_id','bairro'
    ];
     protected $primaryKey = 'idLocal';
    public function solicitacao__servicos(){
        return $this->hasMany('App\Solicitacao_Servico');
    }

}
  