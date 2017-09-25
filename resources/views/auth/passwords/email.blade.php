@extends('padrao')
@section('login','active')
@section('content')


<section id="error" class="container text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="recovery-panel panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Recuperação de Senha</h3>
                    </div>
                    <div class="panel-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form role="form" method="post" action="{{ route('password.email') }}">
                            {{csrf_field()}}
                            <fieldset>
                                <input id="email" name="email" placeholder="email@email.com" class="form-control input-md" required="" type="email">
                                <span class="help-block">Insira o email cadastrado no sistema</span>       

                                <button  type="submit" class="btn btn-primary">Recuperar</button>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</section><!--/#error-->

@stop

