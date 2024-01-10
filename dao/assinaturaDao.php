<?php
class AssinaturaDao{
	private $con;
	
	public function __construct(){
		$this->con = Conexao::getConnection();
	}
	
	public function inserir(AssinaturaModel $assinatura){
		log::setLog("Inserindo Assinatura no banco, ".$assinatura->getNome() ."--".$assinatura->getFuncao());
		
			$sql =  "insert into assinatura(nome, funcao, contato, email, arquivo, url, logAlteracao) values(?,?,?,?,?,?,?)";
		try{
			$stm = $this->con->prepare($sql);
			@$stm->bindParam(1, $assinatura->getNome());
			@$stm->bindParam(2, $assinatura->getFuncao());
			@$stm->bindParam(3, $assinatura->getContato());
			@$stm->bindParam(4, $assinatura->getEmail());
			@$stm->bindParam(5, $assinatura->getArquivo());
			@$stm->bindParam(6, $assinatura->getUrl());
			@$stm->bindParam(7, $assinatura->getLogAlteracao());
			
			$retorno = $stm->execute();
			
			if (!$retorno) return false;
			
			return true;
			
		}catch (Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function alterar(AssinaturaModel $assinatura){
		log::setLog("Alterando assinatura");
	
		$sql =  "update assinatura set funcao=?, contato=?, email=?, logAlteracao=? where arquivo=?;";
		try{
			$stm = $this->con->prepare($sql);
			@$stm->bindParam(1, $assinatura->getFuncao());
			@$stm->bindParam(2, $assinatura->getContato());
			@$stm->bindParam(3, $assinatura->getEmail());
			@$stm->bindParam(4, $assinatura->getLogAlteracao());
			@$stm->bindParam(5, $assinatura->getArquivo());
				
			$retorno = $stm->execute();
				
			if (!$retorno) return false;
				
			return true;
				
		}catch (Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function selecionarPorNome($nomeArquivo){
		log::setLog("Selecionar assunatura por nome");
		
		$sql =  "select * from assinatura where arquivo = ?";
		try{
			$stm = $this->con->prepare($sql);
			@$stm->bindParam(1, $nomeArquivo);
			$result = $stm->execute();
			
			if ($stm->rowCount() < 1) return null;
			
			$result = $stm->fetch(PDO::FETCH_ASSOC);
				$assinatura = new AssinaturaModel();
				$assinatura->setId($result['id']);
				$assinatura->setNome($result['nome']);
				$assinatura->setFuncao($result['funcao']);
				$assinatura->setContato($result['contato']);
				$assinatura->setEmail($result['email']);
				$assinatura->setArquivo($result['arquivo']);
				$assinatura->setUrl($result['url']);
				$assinatura->setLogAlteracao($result['logAlteracao']);
			return $assinatura;
				
		}catch (Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function selecionarPorId($id){
		log::setLog("Selecionar assunatura por Id ".$id);
	
		$sql =  "select * from assinatura where id = ?";
		try{
			$stm = $this->con->prepare($sql);
			@$stm->bindParam(1, $id);
			$result = $stm->execute();
				
			if ($stm->rowCount() < 1) return null;
				
			$result = $stm->fetch(PDO::FETCH_ASSOC);
			$assinatura = new AssinaturaModel();
			$assinatura->setId($result['id']);
			$assinatura->setNome($result['nome']);
			$assinatura->setFuncao($result['funcao']);
			$assinatura->setContato($result['contato']);
			$assinatura->setEmail($result['email']);
			$assinatura->setArquivo($result['arquivo']);
			$assinatura->setUrl($result['url']);
			$assinatura->setLogAlteracao($result['logAlteracao']);
			return $assinatura;
	
		}catch (Exception $e){
			echo $e->getMessage();
		}
	}
	
	public function listar(){
		log::setLog("Listando Assinaturas");
		
		$sql =  "select * from assinatura";
		
		try{
			$stm = $this->con->prepare($sql);
			$retorno = $stm->execute();
			

			
			$dados = array();
			while ($result = $stm->fetch(PDO::FETCH_ASSOC)){
				$assinatura = new AssinaturaModel();
				$assinatura->setId($result['id']);
				$assinatura->setNome($result['nome']);
				$assinatura->setFuncao($result['funcao']);
				$assinatura->setContato($result['contato']);
				$assinatura->setEmail($result['email']);
				$assinatura->setArquivo($result['arquivo']);
				$assinatura->setUrl($result['url']);
				$assinatura->setLogAlteracao($result['logAlteracao']);
				
				$dados[] = $assinatura;
			}
				
			return $dados;
				
		}catch (Exception $e){
			echo $e->getMessage();
		}
	}
	
}