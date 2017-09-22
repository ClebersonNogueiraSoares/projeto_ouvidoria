@extends('padrao')
@section('login','active')
@section('content')


<section id="error" class="container text-center">
    <h1>TELA DE NOVA SENHA</h1>

    <div class="col-md-6 col-md-offset-3">

        <form class="form-horizontal well" method="POST" action="/password/email">
            {{csrf_field()}}
            <div class="control-group" style="position: static;">
                <label for="input-text-1">Email</label>
                <input type="email" class="form-control" id="input-id-1" placeholder="Digite o email do seu cadastro" required>
            </div>

            <br />
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="btn-link" ><span class="glyphicon glyphicon-send"></span>
                    Criar nova senha
                </button>
            </div>
        </form>
    </div>

</section><!--/#error-->

@stop