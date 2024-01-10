<?php //if(!isset($_SESSION['APP'])) die('Esta pagina é bloqueada');

class AssinaturaController{
	private $dao;
	private $view;
	private $extencao = ".png";
	private $diretorioAssinatura = 'view\assinaturas\\';//'c:\assinaturas\\';
	//private $urlAssinatura = 'http://125.0.0.200/projetos/assinatura/view/assinaturas/'; //'http://191.33.78.162:8080/assinaturas/';
	private $urlAssinatura = 'http://192.168.0.200/assinaemail/view/assinaturas/'; //'http://191.33.78.162:8080/assinaturas/';
	
	public function __construct(){
		$this->dao = new AssinaturaDao();
		$this->view = new View();
	}
	
	public function listarAjax(){
		$this->view->limparMensagem();
		
		log::setLog('Listando assinaturas');
		$dados = $this->dao->listar();

	
			$retorno = "";
			$cabecalho = "";
			$cabecalho = $cabecalho . "<thead><td>ID</td>";
			$cabecalho = $cabecalho . "<td>NOME</td>";
			$cabecalho = $cabecalho . "<td>FUNCAO</td>";
			$cabecalho = $cabecalho . "<td>CONTATO</td>";
			$cabecalho = $cabecalho . "<td>EMAIL</td>";
			$cabecalho = $cabecalho . "<td>LINK</td>";
			$cabecalho = $cabecalho . "<td></td></thead>";
			
			foreach ($dados as $assinatura){
				
				
				

				$retorno = $retorno . "<tr><td>".$assinatura->getId()."</td>";
				$retorno = $retorno . "<td>".$assinatura->getNome()."</td>";
				$retorno = $retorno . "<td>".$assinatura->getFuncao()."</td>";
				$retorno = $retorno . "<td>".$assinatura->getContato()."</td>";
				$retorno = $retorno . "<td>".$assinatura->getEmail()."</td>";
				$retorno = $retorno . "<td><a href='index.php?entidade=assinatura&acao=enviarPorEmail&id=".$assinatura->getId()."'>EnviarPor Email</a></td>";
				$retorno = $retorno . "<td><a target='_blank' href='".$assinatura->getUrl()."'>Exibir</a></td></tr>";
				
			}
			
			echo $cabecalho.$retorno;

	}
	
	public function inserir(){
		
		$assinatura = $this->montarAssinatura();
		if($assinatura == false){
			echo "Faltam dados para o campo Nome";
			return false;
			die();
		}
		
		$fileName = md5($assinatura->getNome()).$this->extencao;
		$assinatura->setArquivo($this->diretorioAssinatura.$fileName);
		$assinatura->setUrl($this->urlAssinatura.$fileName);
		
		$mensagem = new Mensagem();
		
		if ($this->dao->selecionarPorNome($assinatura->getArquivo()) == null){
			log::setLog("Inserindo assinatura");
			$assinatura->setLogAlteracao("inserindo ".CLIENTE);
			if(!$this->dao->inserir($assinatura)){
				$mensagem->setTipo('danger');
				$mensagem->setDescricao("Problemas na inclusão da assinatura");
				log::setLog($mensagem->getDescricao());
				echo "Erro na gravação da assinatura no bco". $assinatura->getUrl();
				return false;
			}
		}else{
			$assinatura->setLogAlteracao("Alterando ".CLIENTE);
			log::setLog("Alterando assinatura");
			if(!$this->dao->alterar($assinatura)){
				$mensagem->setTipo('danger');
				$mensagem->setDescricao("Problemas na alteração da assinatura");
				log::setLog($mensagem->getDescricao());
				echo "Erro na gravação da alteracao da assinatura no banco". $assinatura->getUrl();
				return false;
			}
		}
		
			
			
				
			if($this->salvarImagem($assinatura) != null){
				log::setLog("Imagem foi salva");
				echo $assinatura->getUrl();
			
			}else{
				log::setLog("imagem não foi salva");
				echo "link indisponível ". $assinatura->getUrl();
			
			}
	

	}
	
	
	
	
	private function salvarImagem(AssinaturaModel $assinatura){
		log::setLog("Salvando arquivo de imagem assinatura");
		
		if ( isset($_POST["image"]) && !empty($_POST["image"]) ) {
			$funcao = str_replace(" ","",$assinatura->getFuncao());
			$nome = str_replace(" ","",$assinatura->getNome());
			$arquivo = $nome;
		
			// get the dataURL
			$dataURL = $_POST["image"];
		
			// the dataURL has a prefix (mimetype+datatype)
			// that we don't want, so strip that prefix off
			$parts = explode(',', $dataURL);
			$data = $parts[1];
		
			// Decode base64 data, resulting in an image
			$data = base64_decode($data);
		
			// create a temporary unique file name
			//$file = UPLOAD_DIR . uniqid() . '.png';
			
			$file = $assinatura->getArquivo();

			// write the file to the upload directory
			$success = file_put_contents($file, $data);
		
			// return the temp file name (success)
			// or return an error message just to frustrate the user (kidding!)
			//print $success ? $file : 'Unable to save this image.';
			return $file;
		}else{
			return null;
		}
			
			
	}
	
	private function montarAssinatura(){
		log::setLog("Montando assinatura, ".$_POST['nome'].$_POST['funcao']);
		$assinatura = new AssinaturaModel();
		
		//valida se nome é maior que 1
		if(strlen(trim($_POST['nome'])) < 1 ) return false; 
			
		$assinatura->setNome($_POST['nome']);
		$assinatura->setFuncao($_POST['funcao']);
		$assinatura->setContato($_POST['contato']);
		$assinatura->setEmail($_POST['email']);
		//$assinatura->setLink($_POST['nome']);
		
		return $assinatura;
	}
	
	public function enviarPorEmail($id = null){
		if ($_GET['id']) $id = $_GET['id'];
		log::setLog("Preparando envio do email da assinatura $id ");
		$view = new View();
		$email = new EmailModel();
		$assinaturaDao = new AssinaturaDao();
		$assinatura = $assinaturaDao->selecionarPorId($id);
		
		if ($assinatura == null){
			log::setLog("Erro ao selecionar assinatura");
			$view->carregaView("assinatura");
			
		}
		
		$email->setTitle("Assinatura Digital");
		
		$corpoEmail = 	 "Olá ".$assinatura->getNome()
						."<div style='text-align:center; color:#4682B4; background-color:#E6E6FA;padding:10px;'>"
						."<h3>Estes são os passos que deve seguir para configurar sua<br/>"
						."assinatura digital no seu email.</h3>"
						."<p>Link de sua Assinatura Digital ".$assinatura->getUrl()."</p>"
						."<img src='".$assinatura->getUrl()."'><br/>"
						."<p><a target='_blank' href='http://192.168.0.200/assinaemail/index.php?pagina=TutorialDeConfiguracao'>Tutorial de configuração da assinatura no Gmail</a></p>"
						."</div>";
		
		//$corpoEmail = "";
		//$corpoEmail = $corpoEmail . "<h3 style='text-align:center;color:#4682B4; background-color:#E6E6FA;'>Olá. Estes são os passos que deve seguir para configurar sua <br/>";
		//$corpoEmail = $corpoEmail . "assinatura digital no seu email.</h3>";
		//$corpoEmail = $corpoEmail . "<p>Link de sua Assinatura Digital ".$assinatura->getUrl()." </p>";
		//$corpoEmail = $corpoEmail . "<img src='".$assinatura->getUrl()."'>";
		//$corpoEmail = $corpoEmail . "<p><a target='_blank' href='http://125.0.0.200:8081/projetos/assinatura/view/TutorialDeConfiguracao.php'>Tutorial de configuração da assinatura no Gmail</a></p>";
		
		$email->setCorpo($corpoEmail);
		$email->setAddress($assinatura->getEmail());
		
		$emailController = new EmailController();
		log::setLog("Enviando a requisicão de envio de email para ".$assinatura->getEmail());
		
		if($emailController->enviarEmail($email)){
			echo "<script>alert('Assinatura enviada por email');</script>";
		}else{
			echo "<script>alert('Houve erro no envio do email');</script>";
		}
		
		$view->carregaView("assinatura");
	}
}
