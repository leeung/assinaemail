<?php

class Mensagem{
	private $tipo;
	private $descricao;
	
	public function __construct($tipo ='', $descricao=''){
		$this->tipo = $tipo;
		$this->descricao = $descricao;
	}
	
	public function getTipo() {
		return $this->tipo;
	}
	public function setTipo($tipo) {
		$this->tipo = $tipo;
		return $this;
	}
	public function getDescricao() {
		return $this->descricao;
	}
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
		return $this;
	}
	
	
	
}