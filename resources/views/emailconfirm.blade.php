@extends('padrao')
@section('title','Cadastro confirmado')
@section('cadastrar','active')
@section('content')
<script>
    swal({
        title: "Cadastro realizado com sucesso!",
        text: "O seu e-mail foi verificado com sucesso.",
        icon: "success",
       button: "Logar",
    }).then(function(){
            window.location.href="{{route('login')}}";    
    });
</script>
@stop




