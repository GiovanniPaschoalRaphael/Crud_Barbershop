<?php

	class servico{
		private $_id_servico;
		private $_nome;
		private $_preco;

		public function setIdservico(){
			$cx = new conexao();
			$conn = $cx->getConn();
			$this->_id_servico=$conn->lastInsertId('servico');
		}

		public function setNome($_n){
			$this->_nome=$_n;
		}

		public function setPreco($_p){
			$this->_preco=$_p;
		}

		public function getIdservico(){
			return $this->_id_servico;
		}

		public function getNome(){
			return $this->_nome;
		}

		public function getPreco(){
			return $this->_preco;
		}

		function __construct($n="", $p=""){
			$this->setNome($n);
			$this->setPreco($p);
		}
	}
?>