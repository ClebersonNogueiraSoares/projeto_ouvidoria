<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="token" content="{{csrf_token()}}">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <title>Painel do Municipe</title>
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
                <h2>Área de Administração</h2>
                <div class="content">
                    <div class="box">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box-top">
                            <h4>Administração</h4>
                        </div>
                        <div class="box-content">
                            <div class="row box-form">
                                <div class="col-md-8 col-md-offset-2 well">
                                    <table class="table box-table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                    Nome do Usuário
                                                </th>
                                                <th>
                                                    Alterar cadastro
                                                </th>
                                                <th>
                                                    Excluir
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $da)
                                            <tr class="active">
                                                <td>
                                                    {{$da->id}}
                                                </td>
                                                <td>
                                                    {{$da->nome}}
                                                </td>


                                                <td>
                                                    <form method="POST" name="form_atualizar" action="{{action('AdminController@editar')}}">
                                                        {{csrf_field()}}
                                                        <button type="submit" name="alterar" class="btn btn-primary" value="{{$da->id}}">
                                                            <span class="glyphicon glyphicon-send"></span>
                                                            Alterar
                                                        </button>
                                                    </form>
                                                </td>
                                                <th>
                                                    <form method="POST" name="excluir" action="{{action('AdminController@delete',$da->id)}}" >
                                                          {{csrf_field()}}
                                                          <button type="submit" name="excluir" value="{{$da->id}}"class="btn btn-primary btn-danger">
                                                        <span class="glyphicon glyphicon-send"></span>
                                                        Excluir
                                                    </button>
                                                    </form>
                                                    
                                                </th>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button type=""  name="back" id="voltar" class="btn btn-primary ">
                                        <span class="glyphicon glyphicon-send"></span>
                                        Voltar
                                    </button>
                                </div>
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
        <script href="{{asset('js/bootstrap.min.js')}}"></script>
        <script href="{{asset('js/jquery.min.js')}}"></script>
        </script>
        <script href="{{asset('js/bootstrap.min.js')}}"></script>
        <script href="{{asset('js/jquery.min.js')}}"></script>
    </body>
</html>

