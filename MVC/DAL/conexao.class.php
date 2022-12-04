<?php
	class conexao{
		private $_servername;
		private $_username;
		private $_password;
		private $_db;
		private $_conn;

		public function setServername($_s){
			$this->_servername=$_s;
		}

		public function setUsername($_u){
			$this->_username=$_u;
		}

		public function setPassword($_p){
			$this->_password=$_p;
		}

		public function setDb($_d){
			$this->_db=$_d;
		}

		public function getServername(){
			return $this->_servername;
		}

		public function getUsername(){
			return $this->_username;
		}

		public function getPassword(){
			return $this->_password;
		}

		public function getDb(){
			return $this->_db;
		}

		public function getConn(){
			return $this->_conn;
		}

		public function Conectar(){
			
			try {
		    	$this->_conn = new PDO("mysql:host=$this->_servername;dbname=$this->_db", $this->_username, $this->_password);
    			$this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		}

			catch(PDOException $e)
    		{
    			echo "Conexão falhou: " . $e->getMessage();
    		}
    	}

    	function __construct($_servername="localhost", $_username="root", $_password="", $_db="Barbershop"){
    		$this->setServername($_servername);
    		$this->setUsername($_username);
    		$this->setPassword($_password);
    		$this->setDb($_db);
    		$this->Conectar();
    	}
	}

	//$c=new conexao();
?>