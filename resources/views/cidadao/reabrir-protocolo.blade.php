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
                            <input type="search" name="Buscar" class="form-control" value="" title="Botão de busca" placeholder="Buscar">
                        </div>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 login">
                    Olá {{substr(strtolower(Auth::user()->nome),0,strpos(strtolower(Auth::user()->nome),' '))}} &nbsp;&nbsp;&nbsp; <a href="{{route('logout')}}" title="Sair" ><img src="{{asset('images/security.png')}}" alt="Login"> </a>
                </div>
            </div>

            <!-- ====CONTEÚDO PRINCIPAL==== -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main">
                <h2>Área administrativa</h2>
                <div class="content">
                    <div class="box">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box-top">
                            <h4>Acompanhar serviços</h4>
                        </div>
                        <div class="box-content">
                            <section  class="container login box-form">
                                <div class="col-md-8 col-md-offset-2 well">
                                    <h4>Reabertura de solicitação</h4>
                                    <form class="form-horizontal"  name="form" id="formReabertura" method="post" action="{{action('CidadaoController@move',$data)}}" enctype="multipart/form-data" onsubmit="confirm(event)">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="control-group col-md-8 col-md-offset-1">
                                                <label for="email_Contato">
                                                    Descrição da solicitação
                                                </label>
                                                <textarea class="form-control" name="observacao" rows="4" placeholder="Digite com detalhes do motivo da reabertura do servico" required></textarea>
                                            </div>
                                            <div class="control-group col-md-8 col-md-offset-1">
                                                <label for="anexar">Anexar arquivo</label>
                                                <input type="file" name="anexar[]" required>
                                                <p class="help-block">Fotos ou documentos de no máximo 4mb.</p>
                                                <button type="submit" name="cadastrar" class="btn btn-primary">
                                                    <span class="glyphicon glyphicon-send"></span>
                                                    Reabrir protocolo
                                                </button>
                                            </div>
                                            </section>
                                        </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function confirm(event) {
                    swal({
                        title: "Sucesso!",
                        text: "Sua solicitação foi enviada para análise!",
                        icon: "success",
                    }).then(function (){
            form.submit();
        });
        event.preventDefault();
                }
            </script>
            <script href="{{asset('js/bootstrap.min.js')}}"></script>
            <script href="{{asset('js/jquery.min.js')}}"></script>
    </body>
</html>
