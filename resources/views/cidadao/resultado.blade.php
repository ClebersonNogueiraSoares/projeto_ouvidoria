<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <title>Sistema de Ouvidoria</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <script src ="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">

            <!-- ====TOPO==== -->
            <div class="navbar-fixed-top col-xs-12 col-sm-12 col-md-12 col-lg-12 topo">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    AdminCWCE
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 buscar">
                    <div class="form-group">
                        <label for="input" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <input type="search" name="Buscar"  class="form-control" value="" title="Botão de busca" placeholder="Buscar">
                        </div>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 login">
                    Olá {{substr(strtolower(Auth::user()->nome),0,strpos(strtolower(Auth::user()->nome),' '))}} &nbsp;&nbsp;&nbsp; <a href="{{route('logout')}}" title="Sair" ><img src="{{asset('images/security.png')}}" alt="Login"> </a>    
                </div>
            </div>

            <!-- ====CONTEÚDO PRINCIPAL==== -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main">
                <h2>Área do Munícipe</h2>
                <div class="content">
                    <div class="box">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box-top">
                            <h4>Acompanhar serviços</h4>
                        </div>
                        <div class="box-content">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <table class="table box-table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Protocolo
                                                </th>
                                                <th>
                                                    Data
                                                </th>
                                                <th>
                                                    Tipo Reclamação
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                                <th>
                                                    Ver
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($da as $data)
                                            <tr class="@if($data->status_servicos == 1)danger @if($data->status_servicos == 2) warning @if($data->status_servicos == 3)success @if($data->status_servicos == 4)danger @endif @endif @endif @endif">
                                                <td>
                                                    {{$data->protocolo}}

                                                </td>
                                                <td>
                                                    {{date('d/m/Y', strtotime($data->created_at))}}

                                                </td>
                                                <td>
                                                    {{$data->servicos->descricao}}
                                                </td>
                                                <td>
                                                    @if($data->status_servicos == 1) Em análise @else @if($data->status_servicos == 2) Em execução @else @if($data->status_servicos == 3) Serviço Finalizado @else @if($data->status_servicos == 4) Serviço Reaberto @endif @endif @endif @endif

                                                </td>  
                                                <td>
                                                    <a href="{{action('CidadaoController@resultadoDetalhado2',$data->idSolicitacao_Servicos)}}">
                                                    <button type="button" class="btn btn-default" aria-label="Alinhar na esquerda">
                                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                                    </button>
                                                    </a>
                                                </td>
                                                
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script href="{{asset('js/bootstrap.min.js')}}"></script>
    <script href="{{asset('js/jquery.min.js')}}"></script>
</body>
</html>
