<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Informações da solicitação</title>
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">
        <link href="{{asset('css/main.css')}}" rel="stylesheet">
        <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
        <link href="{{asset('css/estilo.css')}}" rel="stylesheet">
        <link href="{{asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">
        <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/bootstrap-notify.min.js')}}"></script>
    </head>
    <body>
        <div class="col-md-8 col-md-offset-2 well">
            <fieldset>
                <legend>Informações da Solicitação de Serviços</legend>
            </fieldset>

            <table class="table table-striped">

                <tbody>
                    <tr>
                        <th scope="row">Protocolo</th>
                        <td>{{$data->protocolo}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nome do Solicitante</th>
                        <td>Anônino</td>
                    </tr>
                    <tr>
                        <th scope="row">CEP</th>
                        <td colspan="2">{{$data->local->cep}}</td>

                    </tr>
                    <tr>
                        <th scope="row">Rua</th>
                        <td colspan="2">{{$data->local->rua}}</td>

                    </tr>
                    <tr>
                        <th scope="row">Bairro</th>
                        <td colspan="2">{{$data->local->bairro    }}</td>

                    </tr>
                    <tr>
                        <th scope="row">Descrição do local ou ponto de referência</th>
                        <td colspan="2">{{$data->local->descricao_local}}</td>

                    </tr>

                    <tr>
                        <th scope="row">Tipo de requisição</th>
                        <td colspan="2">{{$data->tipo__requisicao->descricao}}</td>

                    </tr>
                    <tr>
                        <th scope="row">Secretaria responsável</th>
                        <td colspan="2">{{$data->secretarias()->descricao}}</td>

                    </tr>
                    <tr>
                        <th scope="row">Tipo de serviço</th>
                        <td colspan="2">{{$data->servicos->descricao}}</td>

                    </tr>
                    <tr>
                        <th scope="row">Observações a respeito da solicitação</th>
                        <td colspan="2">{{$data->observacao}}</td>

                    </tr>
                    <tr>
                        <th scope="row">Status do Serviços</th>
                        <td>@if($data->status_servicos == 1)  Serviço em análise @endif @if($data->status_servicos == 2) Serviço em execução @endif @if($data->status_servicos == 3) Serviço Finalizado @endif @if($data->status_servicos == 4) Solicitação foi encaminhada para ouvidoria @endif</td>
                    </tr>
                </tbody>
            </table>
             <button id="btn" class="btn btn-primary">Clique para imprimir</button>
        </div>
        <script>
         document.getElementById('btn').onclick = function() {
          window.print();
        };
        </script>
    </body>
</html> 