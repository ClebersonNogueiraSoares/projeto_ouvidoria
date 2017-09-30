<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


use App\Cidadao;
use App\User;
use Request;

class OuvidoriaController extends Controller{
      use RegistersUsers;
     public function __construct()
    {
        $this->middleware('guest');
    }
    public function adicionarCid(){
       return view('cadastro');  
    }
    public function salvarCid(){
        
        //Validando os dados do formulario
        $validar = Validator::make(
                [   'nome'=>Request::input('nome'),
                    'sexo'=>Request::input('sexo'),
                    'tel_fixo'=>Request::input('tel_fixo'),
                    'tel_cel'=>Request::input('tel_cel'),
                    'cep'=>Request::input('cep'),
                    'rua'=>Request::input('rua'),
                    'numero'=>Request::input('numero'),
                    'bairro'=>Request::input('bairro'),
                    'cidade'=>Request::input('cidade'),
                    'email'=>Request::input('email'),
                    'password'=>Request::input('password'),  
                ],
                ['nome'=>'required|max:255',
                 'sexo'=>'required|max:10',
                 'tel_fixo'=>'required|max:15', 
                 'tel_cel'=>'required|max:15',
                 'cep'=>'required|max:15',
                 'rua'=>'required|max:45',
                 'numero'=>'required|max:10',
                 'bairro'=>'required|max:45',
                 'cidade'=>'required|max:45',
                 'email' => 'required|string|email|max:255|unique:users',
                 'password' => 'required|min:6|confirmed',  
                 
                ],
                ['required'=>':attribute é obrigatório',
                 'min'=>'Senha deve conter no mínimo 6 caracteres ',
                 'max'=>':attribute deve conter no máximo 45 caracteres',
                 'email'=>':attribute inválido',
                 'unique:users'=>'Já existe um usuário com este email!',
                 'confirmed'=>'As senhas devem ser iguais!'   
                ]);
        if($validar->fails()):
            return redirect()->action('OuvidoriaController@adicionarCid')->withErrors($validar)->withInput();
        endif;
        //Cadastro do Cidadão
          $cid = new Cidadao;
          $cid->nome = Request::input('nome');
          $cid->sexo = Request::input('sexo');
          $cid->tel_fixo = Request::input('tel_fixo');
          $cid->tel_cel = Request::input('tel_cel');
          $cid->cep = Request::input('cep');
          $cid->rua = Request::input('rua');
          $cid->numero = Request::input('numero');
          $cid->bairro = Request::input('bairro');
          $cid->cidade = Request::input('cidade');
          $cid->save();
        //Cadastro do cidadao como usuario
       $usuario = new User;
       $usuario->email = Request::input('email');
       $usuario->password = bcrypt(Request::input('password'));
       $usuario->idCidadao = $cid->id;
       $usuario->save();
       return view('home');
    }
    public function sobre(){
        return view('sobre');
    }
    public function solicitacao(){
        return view('solicitacaoServico');
    }
     public function formSolicitacao(){
        return view('formularioDeServico');
    }
    public function acompanhaServico(){
        return view('acompanhaServico');
    }
    public function facebook(){
        return url('https://www.facebook.com/PrefeituradeTatui/');
    }
    public function portal(){
        return url('https://www.tatui.sp.gov.br');
    }
}
