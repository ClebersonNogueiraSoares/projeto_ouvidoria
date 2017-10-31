<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Solicitacao_Servico;
use Auth;

class CidadaoController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function painel() {
        return view('cidadao.painel-cidadao');
    }

    public function buscarProtocolo() {
        $data = Input::get('protocolo');
        $count = Solicitacao_Servico::where('protocolo', Input::get('protocolo'))->count();
        $protocolo = Solicitacao_Servico::all();
        $data = $protocolo->whereIn('protocolo', $data);
        if ($count > 0) {
            foreach ($data as $a) {
                // dd($data);
                return view('cidadao.resultado-detalhado')->with('data', $a);
            }
        }
        if (Input::get('protocolo') == null) {
            return redirect()->action('CidadaoController@painel')->with('solicitacao', ' ');
        }
        if (!$count > 0) {
            return redirect()->action('CidadaoController@painel')->with('protocolo-invalido', ' ');
        }
    }

    public function meusProtocolos() {
        $count = Solicitacao_Servico::where('idUsuario', Auth::user()->idUsuario)->count();
        $protocolo = Solicitacao_Servico::all();
        $data = $protocolo->whereIn('idUsuario', Auth::user()->idUsuario);
        if ($count > 0) {
            foreach ($data as $a) {
                // dd($data);
                return view('cidadao.resultado')->with('data', $a);
            }
        } else {
            return redirect()->action('CidadaoController@painel')->with('inexiste', ' ');
        }
    }

    public function reabrirProtocolo() {
        
    }
}    