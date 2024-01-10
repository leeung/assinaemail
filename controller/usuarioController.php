<?php //if(!isset($_SESSION['APP'])) die('Esta pagina é bloqueada');


class UsuarioController extends AppController{
	private $dao;
	
	public function UsuarioController(){
		$this->dao = new UsuarioDao();
	}
	
	public function logar(){
		
		$retorno = $this->dao->validaUsuario($this->montaUsuario());
		
		if ($retorno){
			$_SESSION['LOGADO'] = true;
			
			log::setLog('Usuário autenticado, carregando HOME');
			$view = new View();
			//$view->carregaView('home');
			$view->redirecionar('index');
		}else{
			log::setLog('Usuário não autenticado, carregando tela de Login');
			$view = new View();
			//$view->carregaPagina('login',new Mensagem("danger", "Usuário ou senha invalidos"));
			$view->redirecionar('index',new Mensagem("danger", "Usuário ou senha invalidos"));
			
			return false;
		}
		
		return false;
	}
	
	private function montaUsuario(){
		$usuario = new UsuarioModel();
		$usuario->setLogin($_POST['usuario']);
		$usuario->setSenha($_POST['senha']);
		return $usuario;
		
	}
	public function logout(){
		
		log::setLog('Destruindo seção, efetuando logout');
		session_destroy();
		$view = new View();
		$view->carregaPagina('login');
	}

}