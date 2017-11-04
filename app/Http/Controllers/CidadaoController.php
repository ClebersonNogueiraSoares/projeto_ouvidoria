<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Solicitacao_Servico;
use App\Local;
use Auth;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\DB;

class CidadaoController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function painel() {
        return view('cidadao.painel-cidadao');
    }
    public function cadastrarServico(){
        return view('cidadao.cadastrarServico');
    }
    public function resultadoDetalhado2($request){
        $solicitacao = Solicitacao_Servico::all();
        $solicitacao = $solicitacao->whereIn('idSolicitacao_Servicos', $request);
       foreach($solicitacao as $a){
             return view('cidadao.resultado-detalhado')->with('data', $a);
      }
     
    }

    public function resultadoDetalhado(){
        return view('cidadao.resultado-detalhado');
    }

    public function buscarProtocolo() {
        $data = Input::get('protocolo');
        $count = Solicitacao_Servico::where('protocolo', Input::get('protocolo'))->count();
        $protocolo = Solicitacao_Servico::all();
        $data = $protocolo->whereIn('protocolo', $data);
        if ($count > 0) {
            foreach ($data as $a) {
                return $this->resultadoDetalhado()->with('data', $a);
            }
        }
        if (Input::get('protocolo') == null && Input::get('botao') == "1") {
            return redirect()->action('CidadaoController@painel')->with('solicitacao', 'vazio');
        }
        if (Input::get('protocolo') != null && !$count > 0 && Input::get('botao') == "1") {
            return redirect()->action('CidadaoController@painel')->with('solicitacao', 'invalido');
        }
        if ( Input::get('cadastrar') == "2") {
            return $this->cadastrarServico();
        }
        $servicoUsuario = Solicitacao_Servico::where('idUsuario', Auth::user()->id)->count();
        
        $data = $protocolo->whereIn('idUsuario', Auth::user()->id);
        
        if ($servicoUsuario > 0) {
            
                return view('cidadao.resultado')->with('da', $data);
            
        } else {
            return redirect()->action('CidadaoController@painel')->with('solicitacao', 'nenhumProtocolo');
        }
    }

    public function reabrirProtocolo($request) {
        $data = $request;

        return view('cidadao.reabrir-protocolo')->with('data', $data);
    }

    public function move($data) {
        $request = request()->all();
        
        if ($request['anexar']) {
            $doc = $request['anexar'];
            foreach ($doc as $files) {
                
                $filename = $files->getClientOriginalName();
               
                $destinationPath = storage_path('app\public');

                           $files->move($destinationPath, $filename);
            }
            return $this->criarSolicitacao($filename,$data);
        } else {
            return $this->criarSolicitacao($filename = null,$data);
        }
    }

    public function criarSolicitacao($file,$data) {      
        $request = request()->all();
        $destinationPath = storage_path("app/public/{$file}");
        $solicitacao = Solicitacao_Servico::find($data);
        $solicitacao->status_servicos = 4;
        $solicitacao->anexos = $destinationPath;
        $solicitacao->observacao = $request['observacao'];
        $solicitacao->save();
        return $this->criarHtml($solicitacao);
    }

    public function criarHtml($data) {
        return view('cidadao.resultado-detalhado')->with('data', $data);
    }
    public function moveDeCadastro(Request $request) {
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
            return $this->cadastrarSolicitacao($filename);
        } else {
            return $this->cadastrarSolicitacao($filename = null);
        }
    }
    public function cadastrarSolicitacao($file) {
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
                    'idUsuario' => Auth::user()->id,
                    'idTipo_requisicao' => Input::get('tipo_requisicao'),
                    'idLocal' => $local->idLocal
        ]);
        $solicitacao = Solicitacao_Servico::all();
        return $this->detalhes($solicitacao->last());
    }
    public function detalhes($data) {
        return view('cidadao.resultado-detalhado', compact($data));
    }

}
