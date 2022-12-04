<?php

	class administrador{
		private $_login;
		private $_senha;

		public function setLogin(){
			$cx = new conexao();
			$conn = $cx->getConn();
			$sql = "SELECT login FROM administrador";
			$result = $conn->query($sql);
			while ($row = $result->fetch()) {
				$this->_login=$row["login"];
			}
		}

		public function setSenha(){
			$cx = new conexao();
			$conn = $cx->getConn();
			$sql = "SELECT senha FROM administrador";
			$result = $conn->query($sql);
			while ($row = $result->fetch()) {
				$this->_senha=$row["senha"];
			}
		}

		public function getLogin(){
			return $this->_login;
		}

		public function getSenha(){
			return $this->_senha;
		}
	}
?>