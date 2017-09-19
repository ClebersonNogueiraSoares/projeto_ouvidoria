function linkSucesso () {
	<a href="javascript:void(null);" onclick="location.href='sucesso.html';">link</a>
}
$(document).ready(function(){
	$('#dataNascimento').mask('00/00/0000');
})

function confirmacao(){
	$.notify({
		message: 'Cadastro salvo com sucesso'
		},{
		type: 'success'
		});
			return false
}
