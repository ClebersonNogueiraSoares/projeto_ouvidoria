@extends('padrao')
@section('title','Home')
@section('home','active')
@section('content')
@if(session('usuario'))
        <script>
        swal({
            title: "Desculpe!",
            text: "Você não tem permissão para entrar nesta área!",
            icon: "error",
        });
        </script>
        @endif
 <div class="container">
        <div class="center wow">

            <h1>O QUE É UMA OUVIDORIA</h1>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in urna nibh. Donec sollicitudin mi sed enim consequat sagittis. Nunc faucibus turpis turpis, in eleifend ligula cursus sed. Etiam semper risus mi, vitae blandit lectus maximus varius. Cras porta a nisl sit amet dictum. Praesent tincidunt felis at bibendum sollicitudin. Nam non est ac urna tempor ultrices eu a purus. Ut neque tortor, tempor mollis vulputate in, dignissim id risus.</p>
            <br />
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in urna nibh. Donec sollicitudin mi sed enim consequat sagittis. Nunc faucibus turpis turpis, in eleifend ligula cursus sed. Etiam semper risus mi, vitae blandit lectus maximus varius. Cras porta a nisl sit amet dictum. Praesent tincidunt felis at bibendum sollicitudin. Nam non est ac urna tempor ultrices eu a purus. Ut neque tortor, tempor mollis vulputate in, dignissim id risus. Etiam semper risus mi, vitae blandit lectus maximus varius. Cras porta a nisl sit amet dictum. Praesent tincidunt felis at bibendum sollicitudin. Nam non est ac urna tempor ultrices eu a purus. Ut neque tortor, tempor mollis vulputate in, dignissim id risus.</p>
        </div>
    </div>
@stop
