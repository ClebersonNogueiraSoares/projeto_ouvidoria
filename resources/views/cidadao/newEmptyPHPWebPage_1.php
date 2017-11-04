 <!-- ====CONTEÚDO PRINCIPAL==== -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main">
                <h2>Área do Munícipe</h2>
                <div class="content">
                    <div class="box">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 box-top">
                            <h4>Acompanhar serviços</h4>
                        </div>
                        <div class="box-content">
                            <section  class="container login box-form">
                                <div class="col-md-8 col-md-offset-2 well">
                                    <h4>Detalhamento da Solicitação</h4>
                                    <div class="row">
                                        <div class="col-md-3"><strong>Nome do solicitante:</strong></div>
                                        <div class="col-md-5">{{$data->users->nome}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3"><strong>Data da solicitação:</strong></div>
                                        <div class="col-md-5">{{date('d/m/Y', strtotime($data->updated_at))}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3"><strong>Status do Serviço:</strong></div>
                                        <div class="col-md-5"> @if($data->status_servicos == 1) Em análise @else @if($data->status_servicos == 2) Em execução @else @if($data->status_servicos == 3) Serviço Finalizado @else @if($data->status_servicos == 4) Serviço Reaberto @endif @endif @endif @endif </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3"><strong>Tipo de solicitação</strong></div>
                                        <div class="col-md-5">{{$data->tipo__requisicao->descricao}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3"><strong>Secretaria:</strong></div>
                                        <div class="col-md-5">{{$data->secretarias()->descricao}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3"><strong>Tipo de serviço:</strong></div>
                                        <div class="col-md-5">{{$data->servicos->descricao}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3"><strong>Descrição:</strong></div>
                                        <div class="col-md-5">{{$data->observacao}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5"><strong>Imagem do local:</strong></div>
                                    </div>

                                    <div class="row">
                                        <div class="imgcid1">
                                            <img src="{{asset('storage/'.substr(strrchr($data->anexos, "/"), 1))}}" class="img-responsive img-thumbnail imgcid2" alt="">

                                        </div>
                                    </div>

                                    <div class="control-group box-btn col-md-12">
                                        <form name="reabrir-protocolo" method="post" action="{{action('CidadaoController@reabrirProtocolo',$data->idSolicitacao_Servicos)}}" onsubmit="check(event)">
                                             {{csrf_field()}}
                                        <button type="submit" name="buscar" class="btn btn-primary" id="imprimir">
                                            <span class="glyphicon glyphicon-send"></span>
                                            Imprimir
                                        </button> &nbsp;&nbsp;
                                        <button type="submit" name="reabrir-protocolo" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-send"></span>
                                            Reabrir solicitação
                                        </button>
                                        </form>

                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
   <script>
        document.getElementById('imprimir').onclick = function () {
            window.print();
            history.back();

        };
    </script>
    <script>
        function check(event){
            var status = {{$data->status_servicos}};
            console.log(status);
            if (status == 1) {
                swal({
                    title: "Ops!",
                    text: "Ainda não é possível reabrir o protocolo,pois ele está em análise!",
                    icon: "warning",
                });
                  event.preventDefault();
            }
            if (status == 2) {
                swal({
                    title: "Ops!",
                    text: "Ainda não é possível reabrir o protocolo,pois ele está em fase de execução!",
                    icon: "warning",
                });
                  event.preventDefault();
            }
        }
    </script>