<!DOCTYPE html>
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
                <h2>Área administrativa</h2>
                <div class="content">
                    <div class="box">
                        <div class="col-xs-12 col-sm-12 col-md-12 box-top">
                            <h4>Acompanhar serviços</h4>
                        </div>
                        <div class="box-content">

                            <section  class="container login box-form">
                                <div class="col-md-8 col-md-offset-2 well">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div>
                                                <form method="post" name="todos" action="{{action('AdminController@getServicoAll')}}">
                                                    {{csrf_field()}}
                                                    <button type="submit" name="" class="btn btn-primary" id="">
                                                        <span class="glyphicon glyphicon-send"></span>
                                                        Todos os Serviços
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <form method="post" name="ven" action="{{action('AdminController@getServicoVencido')}}">
                                                {{csrf_field()}}
                                                <button type="submit" name="vencidos" class="btn btn-primary">
                                                    <span class="glyphicon glyphicon-send"></span>
                                                    Prazo Vencido
                                                </button>  
                                            </form>                                                
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="sercretaria">Filtrar por Secretaria</label>
                                            <select  name="tipo_secretaria" id="tipo_secretaria" class="form-control" onchange="mostrar_secretaria()">
                                                <option value="" selected disabled="">Selecione a secretaria</option>
                                                <option value="1">Educação</option>
                                                <option value="2">Fiscalização</option>
                                                <option value="3">Meio ambiente</option>
                                                <option value="4">Obras</option>
                                                <option value="5">Saúde</option>
                                                <option value="6">Segurança</option>
                                                <option value="7">Trânsito e vias</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="control-group controls controls-row">
                                                <label for="numero">Buscar por endereço</label>
                                                <input type="text" name="endereco" value="" class="form-control" id="endereco"  placeholder="Digite o endereço"  title="endereco">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="control-group controls controls-row">
                                                <label for="bairro">Buscar por Protocolo</label>
                                                <input type="text" name="protocolo" class="form-control" value="" id="protocolo" placeholder="Digite o número do protocolo">

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="sercretaria">Filtrar por status</label>
                                            <select name="tipo_secretaria" id="tipo_secretaria" class="form-control" onchange="mostrar_secretaria()">
                                                <option value="1">Aguardando</option>
                                                <option value="2">Em processo</option>
                                                <option value="3">Finalizado</option>
                                            </select>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="control-group col-md-2">
                                        <button type="submit" name="Cadastrar" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-send"></span>
                                            Buscar
                                        </button>
                                    </div>
                                    <div class="col-md-10">
                                        <button type=""  name="back" id="voltar" class="btn btn-primary ">
                                            <span class="glyphicon glyphicon-send"></span>
                                            Voltar
                                        </button>

                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('voltar').onclick = function () {
               window.history.back()

            };
        </script>
        <script href="{{asset('js/bootstrap.min.js')}}"></script>
        <script href="{{asset('js/jquery.min.js')}}"></script>
    </body>
</html>