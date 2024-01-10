<?php
//if(!isset($_SESSION['APP'])) die('Esta pagina é bloqueada');

class View{
	
	public function carregaView($view, $mensagem =  null, $dados = null){
		if ($mensagem == null) $mensagem =new Mensagem();
		log::setLog('Carregando view, '.$view);
		$log = AppController::mostraLog();
		require_once 'view/index.php';
	}
	
	public function carregaPagina($pagina, $mensagem =  null, $dados = null){
		if ($mensagem == null) $mensagem =new Mensagem();
		
		log::setLog('Carregando pagina, '.$pagina);
		require_once 'view/'.$pagina.'.php';
	}
	
	public function redirecionar($arquivo, Mensagem $mensagem = null){
		//if ($mensagem == null) $mensagem = new Mensagem();
		//$_SESSION['MSG']['TIPO'] = $mensagem->getTipo();
		//$_SESSION['MSG']['DESCRICAO'] = $mensagem->getDescricao();
		header("Location: view/".$arquivo.".php");
	}
	
	public function limparMensagem(){
			$_SESSION['TIPO'] = '';
			$_SESSION['DESCRICAO'] = '';
	}

	
}