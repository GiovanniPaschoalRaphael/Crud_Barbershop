<?php

	class funcionario{
		private $_id_funcionario;
		private $_nome_func;
		private $_telefone_func;
		private $_email_func;

		public function setIdfuncionario(){
			$cx = new conexao();
			$conn = $cx->getConn();
			$this->_id_funcionario=$conn->lastInsertId('funcionario');
		}

		public function setNomefunc($_n){
			$this->_nome_func=$_n;
		}

		public function setTelefonefunc($_t){
			$this->_telefone_func=$_t;
		}

		public function setEmailfunc($_e){
			$this->_email_func=$_e;
		}

		public function getIdfuncionario(){
			return $this->_id_funcionario;
		}

		public function getNomefunc(){
			return $this->_nome_func;
		}

		public function getTelefonefunc(){
			return $this->_telefone_func;
		}

		public function getEmailfunc(){
			return $this->_email_func;
		}

		function __construct($n="", $t="", $e=""){
			$this->setNomefunc($n);
			$this->setTelefonefunc($t);
			$this->setEmailfunc($e);
		}
	}
?>