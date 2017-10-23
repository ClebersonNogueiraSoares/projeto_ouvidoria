<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\meuResetSenha;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email','email_token', 'password', 'nome', 'sexo', 'cpf', 'tel_fixo', 'tel_cel', 'cep', 'rua', 'numero', 'bairro', 'cidade'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     protected $primaryKey = 'id';
    public function sendPasswordResetNotification($token) {
        $this->notify(new meuResetSenha($token));
    }

    public function tipo__usuarios() {
        return $this->belongsTo('App\Tipo_Usuario');
    }

    public function solicitacao__servicos() {
        return $this->hasMany('App\Solicitacao_Servico');
    }

}
