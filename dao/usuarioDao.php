<?php
//if(!isset($_SESSION['APP'])) die('Esta pagina é bloqueada');

class UsuarioDao{
	private $con = null;
	
	public function __construct(){
		$this->con = conexao::getConnection();
	}
	
	
	public function validaUsuario(UsuarioModel $usuario){

		$query = "SELECT nome, usuario FROM USUARIOS WHERE usuario=? AND SENHA=?";
		
		try{
			$stm = $this->con->prepare($query);
			$stm->bindValue(1, $usuario->getLogin());
			$stm->bindValue(2, $usuario->getSenha());
			
			$stm->execute();

			if ($stm->rowCount() > 0){
				return true;
			}
				return false;
		}catch (Exception $e){

			echo $e->getMessage();
		}
		
	}
	
	public function listarPorUsuario(UsuarioModel $usuario){
		
	
		$query = "SELECT nome, usuario  FROM USUARIOS WHERE usuario=?";
		
		try{
			$stm = $this->con->prepare($query);
			$stm->bindValue(1, $usuario->getLogin());
		
			$stm->execute();
			
			if (!$stm->rowCount()>0) return false;
				
			$lista = $stm->fetch(PDO::FETCH_ASSOC);
				
			return $lista;
				
		}catch (Exception $e){
			echo $e->getMessage();	
		}
	
	}
	
	
}