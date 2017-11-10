<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Secretaria;
use App\Solicitacao_Servico;

class AdminController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    //Métodos do ADM do módulo de gestão de  usuários
    public function painel() {
        return view('adm.administrador');
    }

    public function admUsers() {
        return view('adm.administrador_usuarios');
    }

    public function userResult() {
        return view('adm.administrador_usuarios_resultado');
    }

    public function getUsers() {
        $request = request()->all();
        if (isset($request['tipo_filtro']) && $request['tipo_filtro'] != null) {
            $coluna = $request['tipo_filtro'];
            $valor = $request['campo'];
            $usuario = User::all()->where($coluna, $valor);
            if ($usuario->count() == 0) {
                return redirect()->action('AdminController@admUsers')->with('teste', 'vazio');
            }
            return view('adm.administrador_usuarios_resultado')->with('data', $usuario);
        } else {
            $usuario = DB::select("SELECT id,nome,idTipo_usuario from users");
            return view('adm.administrador_usuarios_resultado')->with('data', $usuario);
        }
    }

    public function editar() {
        $request = request()->all();
        if (!empty($request['alterar'])) {
            // $usuario = DB::select("SELECT *FROM users WHERE id = " . $request['alterar']);
            $usuario = User::all();
            $usuario = $usuario->whereIn('id', $request['alterar']);
            foreach ($usuario as $da) {
                return view('adm.administrador_usuarios_resultado_detalhado')->with('data', $da);
            }
        }
        return redirect()->action('AdminController@getUsers')->withInput();
    }

    public function update() {
        $request = request()->all();
        $update = User::find($request['buscar']);
        $update->nome = $request['nome'];
        $update->email = $request['email'];
        $update->cpf = $request['cpf'];
        $update->rua = $request['rua'];
        $update->numero = $request['numero'];
        $update->bairro = $request['bairro'];
        $update->cidade = $request['cidade'];
        $update->tel_fixo = $request['tel_fixo'];
        $update->tel_cel = $request['tel_cel'];
        $update->idTipo_usuario = $request['nivel-acesso'];
        if (!empty($request['nivel-acesso']) && $request['nivel-acesso'] == 2) {
            $secretario = Secretaria::find($request['secretario']);
            $secretario->secretario = $request['nome'];
            $update->save();
            $secretario->save();
            return redirect()->action('AdminController@admUsers')->with('update', ' ');
        }
        $update->save();
        return redirect()->action('AdminController@admUsers')->with('update', ' ');
    }

    public function delete() {
        $request = request()->all();
        $usuario = DB::delete('DELETE FROM users WHERE id = ' . $request['excluir']);
        return redirect()->action('AdminController@getUsers')->withInput();
    }

    //Métodos da ADM do módulo de gestão de serviços
    public function servicoDenuncia() {
        return view('adm.administrador_servicos_denuncias');
    }

    public function getDenuncias() {
        $denuncias = Solicitacao_Servico::all()->whereIn('idTipo_requisicao', 2);
        if($denuncias->count() == 0){
            return redirect()->action('AdminController@servicoDenuncia')->with('denuncia','vazia');
        }
        return view('adm.administrador_denuncias')->with('data', $denuncias);
    }

    public function detalharDenuncia() {
       $request = request()->all();
        $solicitacao = Solicitacao_Servico::all();
        $solicitacao = $solicitacao->whereIn('idSolicitacao_Servicos',$request['detalhar'] );
        foreach ($solicitacao as $a) {
            return view('adm.resultado-detalhado')->with('data', $a);
        }
        
    }
    public function excluirDenuncia(){
      $request = request()->all();
        $delete = DB::delete('DELETE FROM solicitacao__servicos WHERE idSolicitacao_Servicos = ' . $request['excluir']);
        return redirect()->action('AdminController@servicoDenuncia')->with('denuncia','deletada');
    }
    
}
