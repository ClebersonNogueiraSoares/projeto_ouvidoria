<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Routing\Controller;
use Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class Autenticacao extends Controller {

    use AuthenticatesUsers;

    public function __construct() {
        $this->middleware('guest')->except('logout');
    }
    protected function validator(array $data)
{
    return Validator::make($data, [
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|confirmed|min:6',
    ],
        ['required' => ':attribute é obrigatório',
        'min' => 'Senha deve conter no mínimo 6 caracteres ',
        'max' => ':attribute deve conter no máximo 255 caracteres',
        'email' => ':attribute inválido',
        'unique:users' => 'Já existe um usuário com este email!',
        'confirmed' => 'As senhas devem ser iguais!'
        ]);
}


    public function autenticar() {
        if (Auth::attempt(['email' => Request::input('email'), 'password' => Request::input('password')])) {
            return redirect()->intended('ouvidoria');
        } else {
            Session::flash('alert',"<div class='col-md-6 col-md-offset-3'><div class='alert alert-danger'>Login ou Senha incorretos</div></div>");
            return redirect('login');
        }
    }

}
