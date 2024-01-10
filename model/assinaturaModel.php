<?php

class AssinaturaModel{
	private $id;
	private $nome;
	private $funcao;
	private $contato;
	private $email;
	private $arquivo;
	private $url;
	private $logAlteracao;
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getNome() {
		return $this->nome;
	}
	public function setNome($nome) {
		$this->nome = $nome;
		return $this;
	}
	public function getFuncao() {
		return $this->funcao;
	}
	public function setFuncao($funcao) {
		$this->funcao = $funcao;
		return $this;
	}
	public function getContato() {
		return $this->contato;
	}
	public function setContato($contato) {
		$this->contato = $contato;
		return $this;
	}
	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}
	public function getArquivo() {
		return $this->arquivo;
	}
	public function setArquivo($arquivo) {
		$this->arquivo = $arquivo;
		return $this;
	}
	public function getUrl() {
		return $this->url;
	}
	public function setUrl($url) {
		$this->url = $url;
		return $this;
	}
	public function getLogAlteracao() {
		return $this->logAlteracao;
	}
	public function setLogAlteracao($logAlteracao) {
		$this->logAlteracao = $logAlteracao;
		return $this;
	}
	
	
	
	
}