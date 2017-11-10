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
        <script src =" https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script> 
    </head>
    <body>
        @if(session('teste')=="vazio")
             <script>
        swal({
            title: "Desculpe!",
            text: "Não foram encontrados registros de sua busca em nosso sistema!",
            icon: "warning",
        });
        </script>
        @endif
        @if(session('update'))
             <script>
        swal({
            title: "Sucesso!",
            text: "O registro foi atualizado com sucesso!",
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
                            <input type="" name="Buscar" id="" class="form-control" value="" title="Botão de busca" placeholder="Buscar">
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
                                <div class="col-md-8 col-md-offset-2 well botoes">

                                    <div class="row">
                                        <div class="control-group box-btn col-md-8 col-md-offset-2">
                                            <br />
                                            <legend>
                                                Usar o botão abaixo para listar todos os usuários</legend>
                                            <form method="POST" action="{{action('AdminController@getUsers')}}">
                                                {{csrf_field()}}

                                                <button type="submit" name="Cadastrar" class="btn btn-primary" id="btn-link">
                                                    <span class="glyphicon glyphicon-send"></span>
                                                    Listar todos os usuários
                                                </button>
                                            </form>
                                            <hr />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="control-group box-btn col-md-8 col-md-offset-2">
                                            <br />
                                            <legend>
                                                Pesquisa avançada
                                            </legend>
                                            <form method="POST" action="{{action('AdminController@getUsers')}}">
                                                {{csrf_field()}}
                                                <div class="col-md-5">
                                                    <label for="tipo_requisicao">Tipo de filtro</label>
                                                    <select  name="tipo_filtro" id="tipo_filtro" class="form-control"  required>
                                                        <option value="" selected disabled="">Escolha o filtro</option>
                                                        <option value="nome">Nome</option>
                                                        <option value="email">E-mail</option>
                                                        <option value="cpf">CPF</option>
                                                    </select>
                                                </div>
                                                <div id="campo"class="col-md-7">
                                                    <div class="control-group controls controls-row">
                                                        <label for="endereco">Digite seu nome,email ou cpf</label>
                                                        <input type="" name="campo" class="form-control" value="" id="campo" placeholder="Sem nome" >
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" name="listar" class="btn btn-primary" id="">
                                        <span class="glyphicon glyphicon-send"></span>
                                        Listar
                                    </button>
                                    </form>
                                    <div class="row">
                                        <div class="col-md-4 col-md-offset-1">
                                            <button type=""  name="back" id="voltar" class="btn btn-primary ">
                                                <span class="glyphicon glyphicon-send"></span>
                                                Voltar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function select(){
                
            }
        </script>
        <script>
  
            document.getElementById('voltar').onclick = function () {
                history.go(-1);

            };
        </script>
        <script href="{{asset('js/bootstrap.min.js')}}"></script>
        <script href="{{asset('js/jquery.min.js')}}"></script>
    </body>
</html>

