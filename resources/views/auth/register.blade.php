@extends('padrao')
@section('title','Cadastrar de Usuário')
@section('cadastrar','active')
@section('content')

<h1 class="text-center">TELA DE CADASTRO CIDADÃO</h1>
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
<div class="col-md-8 col-md-offset-2 well">
    <form class="form-horizontal"   method="post" action="{{route('register')}}">
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
                        <input type="text" name="rua" class="form-control" value="" id="route" onFocus="geolocate()"  placeholder="Digite o seu endereço" required>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="control-group controls controls-row">
                        <label for="cep">Numero</label>
                        <input type="text" name="numero"value="{{old('numero')}}" class="form-control" id=""  placeholder="Digite o seu numero"  title="numero" required>

                    </div>
                </div>
            </div>
            <br/>
            <div class="control-group controls controls-row">
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" class="form-control" value="{{old('bairro')}}" id="sublocality_level_1" placeholder="Digite o seu bairro" required>

            </div>
            <br />
            <div class="row">
                <div class="col-md-9">
                    <div class="control-group controls controls-row">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" value="{{old('cidade')}}" class="form-control" id="administrative_area_level_2" placeholder="Digite o sua cidade" required>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="control-group controls controls-row">
                        <label for="cep">CEP</label>
                        <input type="text" name="cep" class="form-control" value="{{old('cep')}}"id="postal_code" placeholder="Digite o CEP" pattern="[0-9]{8}" title="Somente números" required>

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
<script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        route: 'long_name',
        administrative_area_level_2: 'long_name',
        sublocality_level_1:'long_name',
        postal_code: 'short_name'
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
             //document.getElementById(component).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1Mg1b6X5MFnUVnYHm2njnV_IMa_jP-vQ&libraries=places&callback=initAutocomplete"
        async defer></script>
