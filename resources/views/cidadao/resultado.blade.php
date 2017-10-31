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
        @if(session('solicitacao'))
            <script>
            swal({
            title: "Ops!",
            text: "Você não possui solicitações de serviços ou denúncias!",
            icon: "info",
        });
            </script>
            
            @else
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
                    Login &nbsp;&nbsp;&nbsp; <img src="{{asset('img/security.png')}}" alt="Login">
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
                                                    ID
                                                </th>
                                                <th>
                                                    Nome do solicitante
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="active">
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    João da Silva
                                                </td>
                                                <td>
                                                    Aguardando
                                                </td>
                                            </tr>
                                            <tr class="success">
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    Cleberson Soares
                                                </td>
                                                <td>
                                                    Finalizado
                                                </td>
                                            </tr>
                                            <tr class="warning">
                                                <td>
                                                    12
                                                </td>
                                                <td>
                                                    Cleiton Silva
                                                </td>
                                                <td>
                                                    Em processo
                                                </td>
                                            </tr>
                                            <tr class="success">
                                                <td>
                                                    3
                                                </td>
                                                <td>
                                                    Eduardo Vieira
                                                </td>
                                                <td>
                                                    Finalizado
                                                </td>
                                            </tr>
                                            <tr class="active">
                                                <td>
                                                    4
                                                </td>
                                                <td>
                                                    William Pinheiro
                                                </td>
                                                <td>
                                                    Aguardando
                                                </td>
                                            </tr>
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
    @endif
    <script href="{{asset('js/bootstrap.min.js')}}"></script>
    <script href="{{asset('js/jquery.min.js')}}"></script>
</body>
</html>