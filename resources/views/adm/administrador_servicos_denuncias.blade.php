<!DOCTYPE html>
<html>
    <html lang="{{ app()->getLocale() }}">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
            <title>Administração</title>
            <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
            <link rel="stylesheet" href="{{asset('css/style.css')}}">
              <script src =" https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
        </head>
        <body>
             @if(session('denuncia')=="vazia")
             <script>
        swal({
            title: "Desculpe!",
            text: "Não há denúncias cadastradas em nosso sistema!",
            icon: "warning",
        });
        </script>
        @endif
            @if(session('denuncia')=="deletada")
             <script>
        swal({
            title: "Sucesso!",
            text: "Denúncia deletada com sucesso!",
            icon: "success",
        });
        </script>
        @endif

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
                    <h2>Área de Administração</h2>
                    <div class="content">
                        <div class="box">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box-top">
                                <h4>Administração</h4>
                            </div>
                            <div class="box-content">

                                <section  class="container login box-form box-botao">
                                    <div class="col-md-6 col-md-offset-3 well botoes">
                                        <ul>
                                            <li>
                                                <a href="{{action('AdminController@getDenuncias')}}">
                                                    <i class="fa fa-bullhorn fa-3x" aria-hidden="true"></i>
                                                    <p><br />Denúncias</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="administrador_servicos.html">
                                                    <i class="fa fa-wrench fa-3x" aria-hidden="true"></i>
                                                    <p><br />Serviços</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </section>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script href="{{asset('js/bootstrap.min.js')}}"></script>
            <script href="{{asset('js/jquery.min.js')}}"></script>
        </div>
