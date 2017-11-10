<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="token" content="{{csrf_token()}}">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <title>Alterar Usuário</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <script src =" https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
         <script src="{{asset('js/jquery.mask.min.js')}}"></script>
         <script src="{{asset('js/validator.min.js')}}"></script>
        <script>
            $(document).ready(function () {
                $('#telefoneFixo').mask('(00) 0000-0000');
                $('#telefoneCelular').mask('(00) 00000-0000');
                $('#postal_code').mask('00000-000');
                $('#cpf').mask('000.000.000-00');
            })

            function confirmacao() {
                $.notify({
                    message: 'Cadastro salvo com sucesso'
                }, {
                    type: 'success'
                })
                return false
            }
        </script>
    
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
                            <section  class="container login box-form">
                                <div class="col-md-8 col-md-offset-2 well">
                                   <center> <h4 > <strong>Atualizar dados do Usuário</strong></h4></center>
                                   <br />
                                    <div class="row">
                                       <form method="POST" name="form_update" id="form_update" action="{{action('AdminController@update')}}">
                                        {{csrf_field()}}
                                        <div class="col-md-3"><strong>Nome do usuário:</strong></div>
                                        <div class="col-md-5"> 
                                            
                                            <input type="text" name="nome" value="{{$data->nome}}"  class="form-control">
                                        </div>
                                    </div>
                                    <br />
                                    
                                    <div class="row">
                                        <div class="col-md-3"><strong>E-mail:</strong></div>
                                        <div class="col-md-5">
                                            <input type="text" name="email" value="{{$data->email}}" class="form-control">
                                        </div>
                                    </div>
                                    <br />
                                    
                                    <div class="row">
                                        <div class="col-md-3"><strong>CPF:</strong></div>
                                        <div class="col-md-5">
                                            <input type="text" name="cpf" value="{{$data->cpf}}" id="cpf" class="form-control">
                                        </div>
                                    </div>
                                    <br />
                                     <div class="row">
                                        <div class="col-md-3"><strong>Endereço</strong></div>
                                        <div class="col-md-5">
                                             <input type="text" name="rua" value="{{$data->rua}}" class="form-control"></div>
                                    </div>
                                     <br />
                                     <div class="row">
                                        <div class="col-md-3"><strong>Número</strong></div>
                                        <div class="col-md-5">
                                             <input type="text" name="numero" value="{{$data->numero}}" class="form-control"></div>
                                    </div>
                                     <br />
                                     <div class="row">
                                        <div class="col-md-3"><strong>Bairro</strong></div>
                                        <div class="col-md-5">
                                             <input type="text" name="bairro" value="{{$data->bairro}}" class="form-control"></div>
                                    </div>
                                     <br />
                                     <div class="row">
                                        <div class="col-md-3"><strong>Cidade</strong></div>
                                        <div class="col-md-5">
                                             <input type="text" name="cidade" value="{{$data->cidade}}" class="form-control"></div>
                                    </div>
                                     <br />
                                     <div class="row">
                                        <div class="col-md-3"><strong>Telefone</strong></div>
                                        <div class="col-md-5">
                                            <input type="text" name="tel_fixo" value="{{$data->tel_fixo}}"  id="telefoneFixo"class="form-control"></div>
                                    </div>
                                     <br />
                                     <div class="row">
                                        <div class="col-md-3"><strong>Celular</strong></div>
                                        <div class="col-md-5">
                                            <input type="text" name="tel_cel" value="{{$data->tel_cel}}" id="telefoneCelular"class="form-control"></div>
                                    </div>
                                     <br />
                                    <div class="col-md-6">
                                        
                                        <strong> <p>Alterar nível de acesso</p></strong>
                                        <select  name="nivel-acesso" id="nivel-acesso" class="form-control" id="acesso" onchange="mostrar_secretaria()" required>
                                            <option value="" selected disabled>Selecione</option>

                                            <option value="1" <?php if($data->idTipo_usuario == 1) echo "selected" ?> >Cidadão</option>
                                            <option value="2" <?php if($data->idTipo_usuario == 2) echo "selected" ?> >Secretário</option>
                                            <option value="3" <?php if($data->idTipo_usuario == 3) echo "selected" ?> >Ouvidor</option>
                                            <option value="4" <?php if($data->idTipo_usuario == 4) echo "selected" ?> >Prefeito</option>
                                            <option value="5" <?php if($data->idTipo_usuario == 5) echo "selected" ?> >Administrador</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6" id="secretaria" style="display: none">
                                        <p><strong>Secretaria</strong></p>
                                        <select  name="secretario" class="form-control">
                                            <option value="" selected disabled>Selecione a secretaria</option>
                                            <option value="1">Educação</option>
                                            <option value="2">Fiscalização</option>
                                            <option value="3">Meio Ambiente</option>
                                            <option value="4">Obras</option>
                                            <option value="5">Saúde</option>
                                            <option value="6">Segurança</option>
                                            <option value="7">Trânsito e Vias</option>
                                        </select>
                                    </div>
                                    
                                        
                                    </form>
                                   <div class="control-group box-btn col-md-12">
                                       <button type="submit" name="buscar" form="form_update" value="{{$data->id}}"class="btn btn-primary">
                                                <span class="glyphicon glyphicon-send"></span>
                                                Aplicar
                                            </button> &nbsp;&nbsp;  
                                       
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
        function mostrar_secretaria() {
            var option = document.getElementById('nivel-acesso').value;
            console.log(option);
            if (option == "2") {
                document.getElementById("secretaria").style.display = 'block';
            }
            if (option != "0" && option != "2") {
                document.getElementById("secretaria").style.display = 'none';
            }
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
