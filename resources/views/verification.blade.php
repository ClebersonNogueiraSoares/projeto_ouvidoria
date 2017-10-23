@extends('padrao')
@section('title','Cadastro confirmado')
@section('cadastrar','active')
@section('content')
<script>
    swal({
    title: "Cadastro realizado com sucesso!",
            text: "Cadastro realizado com sucesso.Um e-email foi enviado para verificação",
            icon: "success",
          
    });
</script>
@stop