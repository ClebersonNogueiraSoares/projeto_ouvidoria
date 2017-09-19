@extends('padrao')
@section('cadastrar','active')
@section('content')


<h1 class="text-center">TELA DE CADASTRO CIDADÃO</h1>
@if(count($errors) > 0)
<div class="alert alert-danger">
    <strong>ERROS:</strong>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
     
        @endforeach
    </ul>
</div>
@endif
<div class="col-md-8 col-md-offset-2 well">
    <form class="form-horizontal"   method="post" action="{{action('OuvidoriaController@salvarCid')}}"name="form">
    {{ csrf_field() }}
        <fieldset>
            <legend>Cadastrar nova conta</legend>
            <div class="row">
                <div class="col-md-9">
                    <div class="control-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" value="{{old('nome')}}"class="form-control" id="nome" placeholder="Digite seu nome completo" required>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="control-group controls controls-row">
                        <label for="sexo">Sexo</label>
                        <select name="sexo" class="form-control">
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>

                        </select>

                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-9">
                    <div class="control-group controls controls-row">
                        <label for="cidade">Endereço</label>
                        <input type="text" name="rua" class="form-control" value="{{old('rua')}}" id="endereco" placeholder="Digite o seu endereço" required>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="control-group controls controls-row">
                        <label for="cep">Numero</label>
                        <input type="text" name="numero"value="{{old('numero')}}" class="form-control" id="numero" placeholder="Digite o seu numero"  title="numero" required>

                    </div>
                </div>
            </div>
            <br/>
            <div class="control-group controls controls-row">
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" class="form-control" value="{{old('bairro')}}"id="bairro" placeholder="Digite o seu bairro" required>

            </div>
            <br />
            <div class="row">
                <div class="col-md-9">
                    <div class="control-group controls controls-row">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" value="{{old('cidade')}}" class="form-control" id="cidade" placeholder="Digite o sua cidade" required>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="control-group controls controls-row">
                        <label for="cep">CEP</label>
                        <input type="text" name="cep" class="form-control" value="{{old('cep')}}"id="cep" placeholder="Digite o CEP" pattern="[0-9]{8}" title="Somente números" required>

                        <p class="help-block">Exemplo: 18520000</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="control-group controls controls-row">
                        <label for="telefone fixo">Telefone Fixo</label>
                        <input type="text" name ="tel_fixo" value="{{old('tel_fixo')}}"class="form-control" id="telefoneFixo" placeholder="Digite o número do telefone fixo"/>

                        <p class="help-block">Utilizar o formato: (15) 9999-9999</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="control-group controls controls-row">
                        <label for="telefone celular">Celular</label>
                        <input type="text" name="tel_cel" value="{{old('tel_cel')}}"class="form-control phone-ddd-mask" id="telefoneCelular" placeholder="Digite o número do celular">

                        <p class="help-block">Utilizar o formato: (15) 99999-9999</p>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" value="{{old('email')}}"class="form-control" id="email" placeholder="Digite seu email" required>

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
        </fieldset>
    </form>
    
</div>
@stop
