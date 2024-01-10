

function showPopUpFechamento(afirmacao, id){
	if(afirmacao == true) window.open('fecharGmud.php?id='+id, 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=NO, TOP=0, LEFT=300, WIDTH=600, HEIGHT=500');
	return afirmacao;
}

$(function (){
	$('#datetimepicker1').datetimepicker();
});