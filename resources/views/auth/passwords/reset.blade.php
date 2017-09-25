@extends('padrao')
@section('login','active')
@section('content')
@if(count($errors)>0)
<div class="alert alert-danger">
    <strong>ERROS:</strong>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>

        @endforeach
    </ul>
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nova senha</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="control-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" value="{{old('email')}}"class="form-control" id="email" value="{{old('email')}}"placeholder="Digite seu email" required>

                        </div>
                        <br />
                        <div class="control-group">
                            <label for="password">Senha</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Digite a sua senha com no mínimo 6 dígitos" required>

                        </div>
                        <br/>
                        <div class="control-group">
                            <label for="password-confirm">Confirmar a senha</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Digite a sua senha novamente" required>
                        </div>
                        <br />
                        <div class="control-group">
                            <button type="submit" name="Cadastrar" class="btn btn-primary" id="btn-link" >
                                <span class="glyphicon glyphicon-send"></span>
                                Cadastrar
                            </button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
