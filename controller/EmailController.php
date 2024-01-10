<?php
class EmailController{
	
	private $email;
	
	public function __construct(){
		$this->email = new PHPMailer();
		
		$this->email->SetLanguage("br");
		$this->email->CharSet = "utf-8";
		$this->email->IsMail();
		$this->email->IsHTML(true);
		$this->email->IsSMTP();
		$this->email->SMTPAuth = true;
		$this->email->SMTPSecure = "ssl";
		$this->email->WordWrap = 50;
		
		$this->email->Host = "smtp.gmail.com";
		$this->email->Port = 465;//465
		
		
		$parse = parse_ini_file("email.ini",true);
		
		//Gmail server
		$this->email->Username = $parse[email_param][usuario]; // Gmail login
		$this->email->Password = $parse[email_param][senha]; // Gmail senha
		
		$this->email->From = $parse[email_param][from];
		$this->email->FromName = $parse[email_param][fromName];
		//$this->email->Subject = "teste";
		
		//ADICIONA DESTINO
		//$$this->email->AddAddress($end);
		
		//adiciona Cco
		//$Email->addBCC("leeungalves@gmail.com", "leeung");
		
		//Adiciona Cc
		//$Email->addCC("lenne.meneses@gmail.com", "lene");
		
		//$body = $Email->filenameToType("visualizarGmud.php?id=17");
		//$Email->AltBody = "para mensagens somente texto";
		
		//$Email->MsgHTML($corpo);
		
	}
	
	public function enviarEmail(EmailModel $email){
		log::setLog("Enviando Email");
		
		$corpoBottom = 	"<br/><br/><br/><p style='font-size:12px;text-align:center;'>Developed by: Ti Casa Freitas</p>"
						."<p style='font-size:12px;text-align:center;'>Contato: leeung@casafreitas.com.br (85)3048-7447</p>";
		
		
		$this->email->Subject = $email->getTitle();
		$this->email->msgHTML($email->getCorpo().$corpoBottom);
		$this->email->addAddress($email->getAddress());
		
		if(!$this->email->Send()) {
			log::setLog("Erro no envio do email ".$this->email->ErrorInfo);
			
			return false;
			
		}
		log::setLog("Email enviado com suscesso");
		return true;
	}
	
	
}