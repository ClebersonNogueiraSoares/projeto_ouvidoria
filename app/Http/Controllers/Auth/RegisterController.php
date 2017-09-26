<?php

namespace App\Http\Controllers\Auth;


use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
        'nome' => 'required|string|max:255',
        'sexo' => 'required|max:10',
        'tel_fixo' => 'required|max:15',
        'tel_cel' => 'required|max:15',
        'cep' => 'required|max:15',
        'rua' => 'required|max:45',
        'numero' => 'required|max:10',
        'bairro' => 'required|max:45',
        'cidade' => 'required|max:45',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        ],
        ['required' => ':attribute é obrigatório',
        'min' => 'Senha deve conter no mínimo 6 caracteres ',
        'max' => ':attribute deve conter no máximo 45 caracteres',
        'email' => ':attribute inválido',
        'unique:users' => 'Já existe um usuário com este email!',
        'confirmed' => 'As senhas devem ser iguais!'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {

        return User::create([
                    'nome' => $data['nome'],
                    'sexo' => $data['sexo'],
                    'tel_fixo' => $data['tel_fixo'],
                    'tel_cel' => $data['tel_cel'],
                    'cep' => $data['cep'],
                    'rua' => $data['rua'],
                    'numero' => $data['numero'],
                    'bairro' => $data['sexo'],
                    'cidade' => $data['cidade'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
        ]);
    }

}
