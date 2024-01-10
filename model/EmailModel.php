<?php

class EmailModel{
	private $title;
	private $address;
	private $cc;
	private $cco;
	private $corpo;
	private $anexo;
	public function getTitle() {
		return $this->title;
	}
	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}
	public function getAddress() {
		return $this->address;
	}
	public function setAddress($address) {
		$this->address = $address;
		return $this;
	}
	public function getCc() {
		return $this->cc;
	}
	public function setCc($cc) {
		$this->cc = $cc;
		return $this;
	}
	public function getCco() {
		return $this->cco;
	}
	public function setCco($cco) {
		$this->cco = $cco;
		return $this;
	}
	public function getCorpo() {
		return $this->corpo;
	}
	public function setCorpo($corpo) {
		$this->corpo = $corpo;
		return $this;
	}
	public function getAnexo() {
		return $this->anexo;
	}
	public function setAnexo($anexo) {
		$this->anexo = $anexo;
		return $this;
	}
	
	
	
	
	
	
}