<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <title>Serviços Fora do Prazo</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
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
                                    <table class="table box-table ">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Data de abertura
                                                </th>
                                                <th>
                                                    Protocolo
                                                </th>
                                                <th>
                                                    Descrição da denúncia
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $da)
                                            <tr class=" table-hover">
                                                <td>
                                                    {{date('d/m/Y', strtotime($da['created_at']))}}
                                                </td>
                                                <td>
                                                    {{$da['protocolo']}}
                                                </td>
                                                <td>
                                                    {{$da['servicos']['descricao']}}

                                                </td>

                                                <th>
                                                    <form method="POST" name="detalhar" action="{{action('AdminController@detalharDenuncia')}}">
                                                        {{csrf_field()}}
                                                        <button type="submit" name="detalhar" class="btn btn-primary btn-info" value="{{$da['idSolicitacao_Servicos']}}">
                                                            <span class="glyphicon glyphicon-send"></span>
                                                            Detalhar
                                                        </button>
                                                    </form>
                                                </th>
                                                <th>
                                                    <form name="denuncia" class="col-md-6" method="post" action="{{action('AdminController@excluirDenuncia')}}">
                                                        {{csrf_field()}}
                                                        <button type="submit" name="excluir" value="{{$da['idSolicitacao_Servicos']}}" class="btn btn-primary btn-danger" id="excluir">
                                                            <span class="glyphicon glyphicon-send"></span>
                                                            Excluir
                                                        </button>

                                                    </form>
                                                </th>
                                            </tr>
                                            @endforeach
                                            </tr>
                                        </tbody>
                                    </table>

                                    <button type=""  name="back" id="voltar" class="btn btn-primary  >
                                            <span class="glyphicon glyphicon-send" ></span>
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
    </body>
</html>    
