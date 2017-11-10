<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <title>Denúncia detalhada</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <script src =" https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
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
                            <input type="search" name="Buscar" id="input" class="form-control" value="" title="Botão de busca" placeholder="Buscar">
                        </div>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 login">
                    Olá {{substr(strtolower(Auth::user()->nome),0,strpos(strtolower(Auth::user()->nome),' '))}} &nbsp;&nbsp;&nbsp; <a href="{{route('logout')}}" title="Sair" ><img src="{{asset('images/security.png')}}" alt="Login"> </a>    
                </div>
            </div>
            
            <!-- ====CONTEÚDO PRINCIPAL==== -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main">
                <h2>Área do Administrador</h2>
                <div class="content">
                    <div class="box">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box-top">
                            <h4>Acompanhar serviços</h4>
                        </div>
                        <div class="box-content">
                            <section  class="container login box-form">
                                <div class="col-md-8 col-md-offset-2 well">
                                    <h4>Detalhamento da Solicitação</h4>
                                    <div class="row">
                                        <div class="col-md-3"><strong>Número de protocolo:</strong></div>
                                        <div class="col-md-5">{{$data->protocolo}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3"><strong>Nome do solicitante:</strong></div>
                                        <div class="col-md-5">{{$data->users->nome}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3"><strong>Data da solicitação:</strong></div>
                                        <div class="col-md-5">{{date('d/m/Y', strtotime($data->updated_at))}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3"><strong>Status do Serviço:</strong></div>
                                        <div class="col-md-5"> @if($data->status_servicos == 1) Em análise @else @if($data->status_servicos == 2) Em execução @else @if($data->status_servicos == 3) Serviço Finalizado @else @if($data->status_servicos == 4) Serviço Reaberto @endif @endif @endif @endif </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-3"><strong>Tipo de solicitação</strong></div>
                                        <div class="col-md-5">{{$data->tipo__requisicao->descricao}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3"><strong>Secretaria:</strong></div>
                                        <div class="col-md-5">{{$data->secretarias()->descricao}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3"><strong>Tipo de serviço:</strong></div>
                                        <div class="col-md-5">{{$data->servicos->descricao}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3"><strong>Descrição:</strong></div>
                                        <div class="col-md-5">{{$data->observacao}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5"><strong>Imagem do local:</strong></div>
                                    </div>

                                    <div class="row">
                                        <div class="imgcid1">
                                            <img src="{{asset('storage/'.substr(strrchr($data->anexos, "/"), 1))}}" class="img-responsive img-thumbnail imgcid2" alt="">

                                        </div>
                                    </div>
                                   <div class="control-group box-btn col-md-12">
                                        <form name="denuncia" class="col-md-6" method="post" action="{{action('AdminController@excluirDenuncia')}}">
                                            {{csrf_field()}}
                                            <button type="submit" name="excluir" value="{{$data->idSolicitacao_Servicos}}" class="btn btn-primary btn-danger" id="excluir">
                                                <span class="glyphicon glyphicon-send"></span>
                                                Excluir
                                            </button>
                                            
                                        </form>
                                        <button type=""  name="back" id="voltar" class="btn btn-primary  >
                                            <span class="glyphicon glyphicon-send" ></span>
                                            Voltar
                                        </button>
                                       <button type="submit" name="buscar" class="btn btn-primary" id="imprimir">
                                                <span class="glyphicon glyphicon-send"></span>
                                                Imprimir
                                            </button> &nbsp;&nbsp;
                                        
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('voltar').onclick = function () {
            history.go(-1);

        };
    </script>
    <script>
        document.getElementById('imprimir').onclick = function () {
            window.print();
            history.back();

        };
    </script>
    <script href="{{asset('js/bootstrap.min.js')}}"></script>
    <script href="{{asset('js/jquery.min.js')}}"></script>
</body>
</html>
