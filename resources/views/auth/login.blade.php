@extends('padrao')
@section('title','Tela de Login')
@section('login','active')
@section('content')


<section id="error" class="container text-center">
    <h1>TELA DE LOGIN</h1>
    @if(session('message'))
        <script>
        swal({
            title: "Por favor!",
            text: "Verifique seu e-mail para ativar sua conta!",
            icon: "info",
        });
        </script>
        @endif
    @if(Session::has('alert'))
    {{Session::get('alert')}}
    @endif
                    <div class="col-md-6 col-md-offset-3">

   <form class="form-horizontal well" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="               control-group" style="position: static;">
                                     <label for="input-text-1">Email</label>
            <input type="email" class="form-control" name="email" id="input-id-1" placeholder="Digite o seu email" value="{{ old('email') }}" required autofocus>
               </div>

                   <div class="control-grou                   p" style="position: static;">
                       <label for="inputPassword">Senha</label>
        <input type="password" name="password"class="form-control" id="inputPassword" placeholder="Digite a sua senha" required>
                               </div>

                                                <br />
                                   <div class="control-group ">
                                       <div>
                                           <button type="submit" class="btn btn-primary" id="btn-link" href="{{ route('login') }}">
                <span class="glyphicon glyphicon-send"></span>
                                       Entrar
                                       </button>
                               </div>
                               <hr>
                               <a class="btn btn-link" href="{{ route('password.request')}}">
                                   Esqueceu a senha?
                               </a>
                       </div>
                       </form>
                   </div>



                   </section><!--/#error-->


                   @stop