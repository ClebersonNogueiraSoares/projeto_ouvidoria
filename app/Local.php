<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model {

    protected $table = 'local';
    public $timestamps = false;
    protected $fillable =[
        'rua','num','descricao_local','place_id','bairro'
    ];

}
  