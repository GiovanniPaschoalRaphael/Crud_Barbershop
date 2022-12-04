<?php

	class cliente{
		private $_id_cliente;
		private $_nome_cli;
		private $_telefone_cli;

		public function setIdcliente(){
			$cx = new conexao();
			$conn = $cx->getConn();
			$this->_id_cliente=$conn->lastInsertId('cliente');
		}

		public function setNomecli($_n){
			$this->_nome_cli=$_n;
		}

		public function setTelefonecli($_t){
			$this->_telefone_cli=$_t;
		}

		public function getIdcliente(){
			return $this->_id_cliente;
		}

		public function getNomecli(){
			return $this->_nome_cli;
		}

		public function getTelefonecli(){
			return $this->_telefone_cli;
		}

		function __construct($n="", $t=""){
			$this->setNomecli($n);
			$this->setTelefonecli($t);
		}
	}
?>