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
