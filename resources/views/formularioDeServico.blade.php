@extends('padrao')
@section('title','Formulario de Solicitacao de Serviço')
@section('servico','active')
@section('content')
<section class="container login">
    <h1 class="text-center">REQUISIÇÃO DE SERVIÇOS OU DENÚNCIA - FORMULÁRIO</h1>

    <div class="col-md-8 col-md-offset-2 well">

        <form class="form-horizontal">
            <div class="row">
                <div class="col-md-9">
                    <div class="control-group controls controls-row">
                        <label for="endereco">Endereço</label>
                        <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Digite o nome da rua para onde deseja solicitar o serviço" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="control-group controls controls-row">
                        <label for="numero">Número</label>
                        <input type="text" name="numero" class="form-control" id="numero" placeholder="Digite o número" pattern="[0-9]" title="Preencha somente com números" required>
                        <p class="help-block">Somente números</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <div class="control-group controls controls-row">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" class="form-control" id="bairro" placeholder="Digite bairro" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="control-group controls controls-row">
                        <label name="cep" for="cep">CEP</label>
                        <input type="text" class="form-control" name="cep" id="cep" placeholder="CEP com 8 dígitos" title="Preencha somente com números" required />
                        <p class="help-block">Exemplo: 18520000</p>
                    </div>
                </div>
            </div>

            <div class="control-group controls controls-row">
                <label for="pontoReferencia">Ponto de referência</label>
                <input type="text" name="Ponto de Referencia" class="pontoReferencia" id="input-id-5" placeholder="Digite um ponto de referência">
            </div>
            <br />

            <div class="row">
                <div class="col-md-6">
                    <label for="tipoRequisicao">Tipo de requisição</label>
                    <select name="Tipo de Requisição" class="form-control">
                        <option>Denúncia</option>
                        <option class="active">Serviço</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="sercretaria">Secretaria de destino</label>
                    <select name="Tipo de Secretaria" class="form-control">
                        <option>Educação</option>
                        <option>Esporte</option>
                        <option>Fazenda</option>
                        <option>Obras</option>
                        <option>Saúde</option>
                    </select>
                </div>
            </div>
            <br />

            <div class="control-group controls controls-row">
                <label for="tipoServico">Tipo de serviço</label>
                <select name="Tipo de Serviço" class="form-control">
                    <option>Buraco na via pública</option>
                    <option>Esgoto</option>
                    <option>Fiscalização</option>
                    <option>Iluminação pública</option>
                    <option>Limpeza urbana</option>
                    <option>Lotes</option>
                    <option>Poda de árvores</option>
                    <option>Praças e jardins</option>
                </select>
            </div>
            <br />

            <div class="control-group">
                <label for="email_Contato">
                    Descrição da solicitação
                </label>
                <textarea class="form-control" name="Digite com detalhes a sua solicitação" rows="4" placeholder="Digite com detalhes a sua solicitação" required></textarea>
            </div>

            <br />
            <div class="control-group">
                <label for="anexar">Anexar arquivo</label>
                <input type="file" name="anexar arquivo" id="anexar">
                <p class="help-block">Fotos ou documentos de no máximo 4mb.</p>
            </div>
            <br />

            <div class="control-group">
                <div>
                    <button type="submit" name="cadastrar" class="btn btn-primary" id="btn-link" formaction="sucesso.html">
                        <span class="glyphicon glyphicon-send"></span>
                        Cadastrar
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>

<div class="col-md-8 col-md-offset-2 well">

    <form class="form-horizontal">
        <div class="control-group">
            <label for="email_Contato">
                Resposta da prefeitura
            </label>
            <textarea class="form-control" rows="4" placeholder="Neste quadro serão enviadas respostas em relação à sua solicitação."></textarea>
        </div>
    </form>
</div>

</section><!--/#error-->
@stop