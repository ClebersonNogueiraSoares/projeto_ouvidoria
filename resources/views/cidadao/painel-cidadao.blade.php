<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <title>Painel do Municipe</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <script src =" https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
        
  </body>
    </head>
    <body>

        <div class="container-fluid">
             @if(session('solicitacao'))
            <script>
            swal({
            title: "Ops!",
            text: "Digite o número de protocolo!",
            icon: "warning",
        });
            </script>
            @endif
             @if(session('protocolo-invalido'))
            <script>
            swal({
            title: "Ops!",
            text: "Protocolo não foi encontrado em nossas bases de dados!",
            icon: "warning",
        });
            </script>
            @endif
            <!-- ====TOPO==== -->
            <div class="navbar-fixed-top col-xs-12 col-sm-12 col-md-12 col-lg-12 topo">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    AdminCWCE
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 buscar">
                    <div class="form-group">
                        <label for="input" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <input type="search" name="consultar"  class="form-control" value="" title="Botão de busca" placeholder="Buscar">
                        </div>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 login">
                    Olá {{substr(strtolower(Auth::user()->nome),0,strpos(strtolower(Auth::user()->nome),' '))}} &nbsp;&nbsp;&nbsp; <img src="{{asset('images/security.png')}}" alt="Login">
                </div>
            </div>

            <!-- ====CONTEÚDO PRINCIPAL==== -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main">
                <h2>Área do Munícipe</h2>
                <div class="content">
                    <div class="box">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box-top">
                            <h4>Acompanhar solicitações</h4>
                            @if(session('protocolo'))
                            <script>
                                swal({
                                    title: "Desculpe!",
                                    text: "O número de protocolo não foi encontrado!",
                                    icon: "warning",
                                });
                            </script>
                            @endif
                            @if(session('inexiste'))
                            <script>
                                swal({
                                    title: "Ops!",
                                    text: "Você ainda não possuí solicitações de serviços ou denúcias!",
                                    icon: "warning",
                                });
                            </script>
                            @endif
                        </div>
                        <div class="box-content">

                            <section  class="container box-form">
                                <div class="col-md-6 col-md-offset-3 well">
                                    <form class="form-horizontal" method="post" action="painel-do-cidadao/consulta-de-protocolo">
                                         {{csrf_field()}}
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="control-group controls controls-row">
                                                        <legend>Protocolo</legend>
                                                        <input type="text" name="protocolo" class="form-control" id="protocolo2" placeholder="Digite o número do protocolo">
                                                        <p class="help-block">Consulte seus protocolos ou escolha um em específico</p>
                                                    </div>
                                                </div>
                                                <br />
                                                <div class="control-group box-btn col-md-12">
                                                    <button type="submit" name="botao" class="btn btn-primary" id="protocolo-cidadao">
                                                        <span class="glyphicon glyphicon-send"></span>
                                                        Consultar
                                                    </button>
                                                </div>
                                                <div class="control-group box-btn col-md-12">
                                                    <br />
                                                    <legend>Abrir uma nova solicitação</legend>
                                                    <button type="submit" name="Cadastrar" class="btn btn-primary"  formaction="sucesso.html">
                                                        <span class="glyphicon glyphicon-send"></span>
                                                        Abrir Solicitação
                                                    </button>
                                                </div>
                                                <div class="control-group box-btn col-md-12">
                                                    <br />
                                                    <legend>Consultar e acompanhar as suas solicitações</legend>
                                                    <button type="submit" name="meusProtocolos" class="btn btn-primary">
                                                        <span class="glyphicon glyphicon-send"></span>
                                                        Listar todos os protocolos
                                                    </button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
   
        <script href="{{asset('js/bootstrap.min.js')}}"></script>
        <script href="{{asset('js/jquery.min.js')}}"></script>
        
  </body>
</html>  
        
    </div>
