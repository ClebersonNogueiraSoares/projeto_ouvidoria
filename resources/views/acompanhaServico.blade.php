@extends('padrao')
@section('title','Acompanhar Serviço')
@section('acompanharServico','active')
@section('content')
<section class="container login">
    <h1 class="text-center">TELA DE ACOMPANHAMENTO DE SERVIÇOS</h1>
     @if(session('protocolo'))
        <script>
        swal({
            title: "Desculpe!",
            text: "O número de protocolo não foi encontrado!",
            icon: "warning",
        });
        </script>
        @endif
    <div class="col-md-8 col-md-offset-2"> 

        <form class="form-horizontal well" method="post"action="{{action('OuvidoriaController@buscarProtocolo')}}">
            {{csrf_field()}}
            <fieldset>
                <legend>Consultar protocolo</legend>
                <div id="pro" class="control-group" style="position: static;">
                    <label for="protocolo">Protocolo</label>
                    <input type="text" name="protocolo" class="form-control" id="protocolo" placeholder="Digite o número do Protocolo" required>
                </div>
                <br />
                <div class="control-group">
                    <div>
                        <button name="buscar" type="submit" class="btn btn-primary" id="btn-link">
                            <span class="glyphicon glyphicon-send"></span>
                            Buscar
                        </button>
                    </div>
                </div>
                <br />
            </fieldset>
        </form>
    </div>

</section><!--/#error-->
@stop