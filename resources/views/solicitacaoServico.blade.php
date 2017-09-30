@extends('padrao')
@section('title','Solicitacão de Serviço')
@section('servico','active')
@section('content')
<section class="container text-center login">
    <h1>TELA DE SOLICITAR SERVIÇOS OU DENÚNCIA</h1>

    <div class="col-md-8 col-md-offset-2">

        <form class="form-horizontal well">
            <br />
            <div class="form-group">
                <div>
                    <a href="/formulario-de-servico">
                        <img class="img-fluid img-thumbnail" src="{{asset('images/anonimo.png')}}" height="156" width="202" alt="Requisição anônima">
                    </a>
                </div>
            </div>
            <label class="control-label" for="inputEmail">Sua solicitação será anônima, porém, ela poderá não ser atendida.</label>
            <br /><br /><br /><br />
            <div class="form-group">
                <div>
                    <a href="{{route('login')}}">
                        <img class="img-fluid img-thumbnail" src="{{asset('images/login.png')}}" height="156" width="202" alt="Requisição sem sigilo">
                    </a>
                </div>
            </div>
            <label class="control-label" for="inputEmail">Os seus dados estarão disponíveis durante toda a tramitação da sua solicitação. </label>
        </form>
    </div>

</section><!--/#error-->

@stop