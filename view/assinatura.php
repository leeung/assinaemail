<!-- CADASTRO -->
<div class="container">
<h3 class="text-center">AssinaEmail</h3>
<div class="row">
<!-- FORMULARIO DE CRIAÇÃO -->
<div class="col-xs-12 col-md-4 col-md-offset-2">
<form class="form-horizontal" action="#" method="post">

<div class="form-group">
<label for="nome"  class="col-xs-12 col-sm-2 control-label">Nome:</label>
<div class="col-xs-12 col-xs-10">
<input id="nome" class="form-control" type="text" name="nome" onchange="drawAssinatura();" placeholder="Nome e Sobre nome">
</div>
</div>

<div class="form-group">
<label for="funcao" class="col-xs-12 col-sm-2 control-label">Funcao /Setor</label>
<div class="col-xs-12 col-xs-10">
<input id="funcao" class="form-control" type="text" name="funcao" onchange="drawAssinatura();" placeholder="Função / Setor">
</div>
</div>
<!--
<div class="form-group">
<label for="setor" class="col-sm-2 control-label">Setor</label>
<div class="col-xs-4">
<input id="setor" class="form-control" type="text" name="setor" onchange="drawAssinatura();">
</div>
</div>
-->

<div class="form-group">
<label for="contato1" class="col-xs-12 col-sm-2 control-label">Contato</label>
<div class="col-xs-12 col-xs-10">
<input id="contato1" class="form-control" type="text" name="contato1" onkeyup="//validaContato(this);" onchange="drawAssinatura();" placeholder="(xx) xxxx-xxxx">
</div>
</div>



<div class="form-group">
<label for="email" class="col-xs-12 col-sm-2 control-label">Email:</label>
<div class="col-xs-12 col-xs-10">
<input id="email" class="form-control" type="mail" name="email" onchange="drawAssinatura();" placeholder="xxxx@casafreitas.com.br">
</div>
</div>

</form>
</div>
    <div class="col-xs-4">
        <label id="labelLayout1">
        <input class="hidden" id="layout1" type="radio" name="layout" value="view/layoutassinaturas/assinaturaModelo05.jpg" checked="true" onchange="drawAssinatura();">
        <img  class="img img-responsive" src='view/layoutassinaturas/assinaturaModelo05.jpg'>
        </label>

        <label id="labelLayout2">
        <input class="hidden" id="layout2" type="radio" name="layout" value="view/layoutassinaturas/assinaturaMaisonModelo01.jpg" onchange="drawAssinatura();">
        <img  class="img img-responsive" src='view/layoutassinaturas/assinaturaMaisonModelo01.jpg'>
        </label>
        <p><a href="index.php?pagina=TutorialDeConfiguracao">Tutorial de configuração</a></p>
    </div>
<!-- IMAGEM -->
<div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
<canvas class="col-xs-12" id="assinatura" width="800" height="162"></canvas>
<div>
<a class="btn" id="btnDowload" onclick="return baixar(this);">donwload</a>
<a class="btn" id="btnSalvar" onclick="salvar(this);">Salvar</a>
<a class="btn" id="btnSalvar" onclick="limpar();">Limpar</a>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12 text-center">
    <a  target="_blank" id="link" class="text-center"></a>
</div>
</div>
</div>
<!-- FIM- CADASTRO -->
<br/><br/>

<div class="container">
<table id="listaAssinaturas" class="table table-striped">
</table>
</div>

<script type="text/javascript" src="view/js/js.js"></script>
<script type="text/javascript">
window.onload = function(){
	listarAssinaturas();
}

</script>


