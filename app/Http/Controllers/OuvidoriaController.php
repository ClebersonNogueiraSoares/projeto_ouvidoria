<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Request;
use App\Local;
use App\Solicitacao_Servico;
class OuvidoriaController extends Controller {

    use RegistersUsers;

    public function __construct() {
        $this->middleware('guest');
    }

    public function sobre() {
        return view('sobre');
    }

    public function solicitacao() {
        return view('solicitacaoServico');
    }

    public function formSolicitacao() {
        return view('formularioDeServico');
    }

    public function acompanhaServico() {
        return view('acompanhaServico');
    }

    public function facebook() {
        return url('https://www.facebook.com/PrefeituradeTatui/');
    }

    public function portal() {
        return url('https://www.tatui.sp.gov.br');
    }

    public function criarSolicitacao($file) {
        $local = Local::create([
                    'cep' => Input::get('cep'),
                    'rua' => Input::get('rua'),
                    'num' => Input::get('numero'),
                    'descricao_local' => Input::get('descricao_local'),
                    'place_id' => Input::get('place_id'),
                    'bairro' => Input::get('bairro')
        ]);
        $destinationPath = storage_path("app/public/{$file}");
        $protocolo = Input::get('protocolo') ? Input::get('protocolo') : time() . "/" . date("y");
        $solicitacao = Solicitacao_Servico::create([
                    'protocolo' => $protocolo,
                    'status_servicos' => 1,
                    'anexos' => $destinationPath,
                    'observacao' => Input::get('observacao'),
                    'idServico' => ((Input::get('servico')) ? Input::get('servico') : ((Input::get('fiz')) ? Input::get('fiz') : ((Input::get('meio')) ? Input::get('meio') : ((Input::get('setor_obra')) ? Input::get('setor_obra') : ((Input::get('sau')) ? Input::get('sau') : ((Input::get('seg')) ? Input::get('seg') : ((Input::get('tran')) ? Input::get('tran') : ""))))))),
                    'idTipo_requisicao' => Input::get('tipo_requisicao'),
                    'idLocal' => $local->idLocal
        ]);
        $solicitacao = Solicitacao_Servico::all();
        return $this->criarHtml($solicitacao->last());
    }

    public function criarHtml($data) {
        return view('informacoes-da-solicitacao')->with('data', $data);
    }

    public function move(Request $request) {
        if ($request->file('anexar')) {
            $doc = $request->file('anexar');
            foreach ($doc as $files) {
                //Recupera o nome original do arquivo
                $filename = $files->getClientOriginalName();
                //Recupera a extensão do arquivo
//                $extension = $files->getClientOriginalExtension();
//                //Definindo um nome unico para o arquivo
//                $name = $filename . '.' . $extension;
                //Diretório onde será salvo os arquivos
                $destinationPath = storage_path('app\public');

                //Move o arquivo para a pasta indicada
               $files->move($destinationPath, $filename);
            }
            return $this->criarSolicitacao($filename);
        } else {
            return $this->criarSolicitacao($filename = null);
        }
    }

    public function buscarProtocolo(){
        $data = Input::get('protocolo');

        $count = Solicitacao_Servico::where('protocolo', Input::get('protocolo'))->count();
        $protocolo = Solicitacao_Servico::all();
        $data = $protocolo->whereIn('protocolo', $data);
        if ($count > 0) {
            foreach ($data as $a) {
                return view('resultado-detalhado')->with('data', $a);
            }
        } else {
            return redirect()->action('OuvidoriaController@acompanhaServico')->with('protocolo','   ');
        }
    }

}
