@extends('padrao')
@section('title','Formulario de Solicitacao de Serviço')
@section('servico','active')
@section('content')
<section class="container login">
    <h1 class="text-center">REQUISIÇÃO DE SERVIÇOS OU DENÚNCIA - FORMULÁRIO</h1>

    <div class="col-md-8 col-md-offset-2 well">
        <form class="form-horizontal"  name="form" id="form" method="post" action="/cadastro/servico" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-9">
                    <div class="control-group controls controls-row">
                        <label for="endereco">Endereço</label>
                        <input type="text" name="rua" class="form-control" value="" id="route" onFocus="geolocate()"  placeholder="Digite o seu endereço" required autofocus>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="control-group controls controls-row">
                        <label for="numero">Número</label>
                        <input type="text" name="numero"value="{{old('numero')}}" class="form-control" id="numero"  placeholder="Digite o seu numero"  title="numero" required>

                        <p class="help-block">Somente números</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <div class="control-group controls controls-row">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" class="form-control" value="{{old('bairro')}}" id="sublocality_level_1" placeholder="Digite o seu bairro" required>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="control-group controls controls-row">
                        <label name="cep" for="cep">CEP</label>
                        <input type="text" name="cep" class="form-control" value="{{old('cep')}}"id="postal_code" placeholder="Digite o CEP"  title="Somente números">

                        <p class="help-block">Exemplo: 18520000</p>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-9">
                    <div class="control-group controls controls-row">
                        <label for="pontoReferencia">Ponto de referência</label>
                        <input type="text" name="descricao_local" class="form-control" id="input-id-5" placeholder="Digite um ponto de referência">
                        <input type="hidden" name="place_id" id="place_id" >
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-md-6">
                    <label for="tipo_requisicao">Tipo de requisição</label>
                    <select  name="tipo_requisicao" id="tipo_requisicao" class="form-control" onchange="mostrar_protocolo()"required>
                        <option value="" selected disabled="">Selecione o tipo de requisição</option>
                        <option value="1">Serviço</option>
                        <option value="2">Denúncia</option>  
                    </select>
                </div>

                <div id="pro" class="col-md-6"  style="display: none" style="position: static;">
                    <label for="protocolo">Protocolo</label>
                    <input type="text" name="protocolo" class="form-control" placeholder="Digite o número do Protocolo">
                </div> 
                <div class="col-md-6">
                    <label for="sercretaria">Secretaria de destino</label>
                    <select name="tipo_secretaria" id="tipo_secretaria" class="form-control" onchange="mostrar_secretaria()" required >
                        <option value="" selected disabled="">Selecione a secretaria</option>
                        <option value="1">Educação</option>
                        <option value="2">Fiscalização</option>
                        <option value="3">Meio ambiente</option>
                        <option value="4">Obras</option>
                        <option value="5">Saúde</option>
                        <option value="6">Segurança</option>
                        <option value="7">Trânsito e vias</option>
                    </select>
                </div>
            </div>
            <br />
            <div class="control-group controls controls-row" id="educacao" style="display: none" >
                <label for="tipoServico">Tipo de serviço</label>
                <select name="servico" id="edu" class="form-control" >
                    <option value="0" >Selecione</option>
                    <option value="1">Falta de vaga</option>
                    <option value="2">Merenda</option>
                    <option value="3">Professores</option>
                    <option value="4">Transporte escolar</option>
                    <option value="5">Transferëncia</option>
                    <option value="6">Outros</option>

                </select>
            </div>
            <div class="control-group controls controls-row" id="fiscalizacao" style="display: none" >
                <label for="tipoServico">Tipo de serviço</label>
                <select name="servico" id="fiz"class="form-control">
                    <option value="0" >Selecione</option>
                    <option value="7">Condições sanitárias irregulares</option>
                    <option value="8">Estabelecimento com acessibilidade irregular</option>
                    <option value="9">Estabelecimento sem alvará</option>
                    <option value="10">Estabelecimento sem nota Fiscal</option>
                    <option value="11">Ocupação irregular de área pública</option>
                    <option value="12">Construção irregular</option>
                    <option value="13">Outros</option>
                </select>
            </div>
            <div class="control-group controls controls-row" id="meio-ambiente" style="display: none" >
                <label for="tipoServico">Tipo de serviço</label>
                <select name="servico" id="meio" class="form-control">
                    <option value="0" >Selecione</option>
                    <option value="14">Aterro Sanitário irregular</option>
                    <option value="15">Caça predatória</option>
                    <option value="16">Desmatamento irregular</option>
                    <option value="17">Maus tratos a animais</option>
                    <option value="18">Poda ou retirada de árvores</option>
                    <option value="19">Despejo de esgoto ou lixo no rio</option>
                    <option value="20">Outros</option>

                </select>
            </div>
            <div class="control-group controls controls-row" id="obras" style="display: none" >
                <label for="tipoServico">Tipo de serviço</label>
                <select name="servico" id="setor_obra" class="form-control" >
                    <option value="0" >Selecione</option>
                    <option value="21">Buraco na via pública</option>
                    <option value="22">Manutenção de praças</option>
                    <option value="23">Demora na execução de obra pública</option>
                    <option value="24">Bueiro/Boca de Lobo/Galerias</option>
                    <option value="25">Ponto de alagamento</option>
                    <option value="26">Vala abertas</option>
                    <option value="27">Poda de árvores</option>
                    <option value="28">Coleta de lixo</option>
                    <option value="29">Coleta seletiva</option>
                    <option value="30">Entulho em via pública</option>
                    <option value="31">Limpeza em terreno baldio</option>
                    <option value="32">Limpeza Urbana</option>
                    <option value="33">Mato alto</option>
                    <option value="34">Pontes</option>
                    <option value="35">Outros</option>
                </select>
            </div>
            <div class="control-group controls controls-row" id="saude" style="display: none" >
                <label for="tipoServico">Tipo de serviço</label>
                <select name="servico" id="sau" class="form-control">
                    <option value="0" >Selecione</option>
                    <option value="36">Demora em marcar consulta ou atendimento</option>
                    <option value="37">Falta de materiais em posto de saúde</option>
                    <option value="38">Falta de medicação</option>
                    <option value="39">Foco da dengue</option>
                    <option value="40">Infestação, proliferação de animais ou pragas</option>
                    <option value="41">Médicos</option>
                    <option value="42">Posto de saúde</option>
                    <option value="43">Transporte para tratamento</option>
                    <option value="44">Vacinas</option>
                    <option value="45">Outros</option>
                </select>
            </div>
            <div class="control-group controls controls-row" id="seguranca" style="display: none" >
                <label for="tipoServico">Tipo de serviço</label>
                <select name="servico" id="seg" class="form-control">
                    <option value="0" >Selecione</option>
                    <option value="46">Baderna ou pertubação da ordem pública</option>
                    <option value="47">Ponto de assalto/Roubo</option>
                    <option value="48">Ponto de Prostituição</option>
                    <option value="49">Ponto de tráfico de drogas</option>
                    <option value="50">Outros</option>
                </select>
            </div>
            <div class="control-group controls controls-row" id="transito" style="display: none" >
                <label for="tipoServico">Tipo de serviço</label>
                <select name="servico" id="tran" class="form-control" >
                    <option value="0" >Selecione</option>
                    <option value="51">Rampa de acessibilidade</option>
                    <option value="52">Bloqueio na via</option>
                    <option value="53">Faixa de pedestre</option>
                    <option value="54">Lombadas</option>
                    <option value="55">Placas de sinalização</option>
                    <option value="56">Mudanças no trânsito</option>
                    <option value="57">Redutor de velociadade</option>
                    <option value="58">Semáforo</option>
                    <option value="59">Falta de sinalização na via ou sinalização precária</option>
                    <option value="60">Outros</option>
                </select>
            </div>
            <br />

            <div  class="control-group" id="descrever" style="display: none">
                <label for="email_Contato">
                    Descrição da solicitação
                </label>
                <textarea class="form-control" name="observacao" rows="4" placeholder="Digite com detalhes a sua solicitação"></textarea>
            </div>

            <br />
            <div class="control-group" id="subir_arquivo" style="display: none">
                <label for="anexar">Anexar arquivo</label>
                <input type="file" name="anexar[]">
                <p class="help-block">Campo não obrigatório.Fotos ou documentos de no máximo 4mb.</p>

            </div>
            <br />
            <div class="control-group">
                <button type="submit" name="Cadastrar" class="btn btn-primary">
                    <span class="glyphicon glyphicon-send"></span>
                    Cadastrar
                </button>
            </div>
        </form>
    </div>
</section>
@stop

<script>

    var placeSearch, autocomplete;
    var componentForm = {
        route: 'long_name',
        sublocality_level_1: 'long_name',
        postal_code: 'short_name',
    };

    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('route')),
                {type: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
                document.getElementById('place_id').value = place.place_id;
                $('#numero').focus();
                //document.getElementById(component).value = val;
            }
        }
    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1Mg1b6X5MFnUVnYHm2njnV_IMa_jP-vQ&libraries=places&callback=initAutocomplete"
async defer></script>
<script type="text/javascript">
    function mostrar_secretaria() {
        var option = document.getElementById("tipo_secretaria").value;
        if (option == "0") {
            document.getElementById("educacao").style.display = 'none';
            document.getElementById("fiscalizacao").style.display = 'none';
            document.getElementById("meio-ambiete").style.display = 'none';
            document.getElementById("obras").style.display = 'none';
            document.getElementById("saude").style.display = 'none';
            document.getElementById("seguranca").style.display = 'none';
            document.getElementById("transito").style.display = 'none';
            document.getElementById("descrever").style.display = 'none';
            document.getElementById("subir_arquivo").style.display = 'none';
        } else {
            if (option == "1") {
                document.getElementById("educacao").style.display = 'block';
                document.getElementById("descrever").style.display = 'block';
                document.getElementById("subir_arquivo").style.display = 'block';
            } else {
                document.getElementById("educacao").style.display = 'none';
            }
            if (option == "2") {
                document.getElementById("fiscalizacao").style.display = 'block';
                document.getElementById("descrever").style.display = 'block';
                document.getElementById("subir_arquivo").style.display = 'block';
            } else {
                document.getElementById("fiscalizacao").style.display = 'none';

            }
            if (option == "3") {
                document.getElementById("meio-ambiente").style.display = 'block';
                document.getElementById("descrever").style.display = 'block';
                document.getElementById("subir_arquivo").style.display = 'block';
            } else {
                document.getElementById("meio-ambiente").style.display = 'none';
            }
            if (option == "4") {
                document.getElementById("obras").style.display = 'block';
                document.getElementById("descrever").style.display = 'block';
                document.getElementById("subir_arquivo").style.display = 'block';
            } else {
                document.getElementById("obras").style.display = 'none';
            }
            if (option == "5") {
                document.getElementById("saude").style.display = 'block';
                document.getElementById("descrever").style.display = 'block';
                document.getElementById("subir_arquivo").style.display = 'block';
            } else {
                document.getElementById("saude").style.display = 'none';
            }
            if (option == "6") {
                document.getElementById("seguranca").style.display = 'block';
                document.getElementById("descrever").style.display = 'block';
                document.getElementById("subir_arquivo").style.display = 'block';
            } else {
                document.getElementById("seguranca").style.display = 'none';
            }
            if (option == "7") {
                document.getElementById("transito").style.display = 'block';
                document.getElementById("descrever").style.display = 'block';
                document.getElementById("subir_arquivo").style.display = 'block';
            } else {
                document.getElementById("transito").style.display = 'none';
            }
        }

    }
    function mostrar_protocolo() {
        var option = document.getElementById("tipo_requisicao").value;
        if (option == "2") {
            document.getElementById("pro").style.display = 'block';
        } else {
            document.getElementById("pro").style.display = 'none';
        }
    }

</script>
<script>
    $('#form').on("submit", function (e){
       e.preventDefault;
        swal({
            title: " Bom trabalho! ",
            text: " O cadastro realizado! ",
            icon: " sucesso ",
            cancel: true,
            confirm: "Confirm",
            timer: 3000,
        });
       

    
</script>

