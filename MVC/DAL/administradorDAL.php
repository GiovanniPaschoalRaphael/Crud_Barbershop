<?php
	require_once("conexao.class.php");
	require_once("../../MODEL/administradorMODEL.class.php");

	class administradorDAL{

		public function Incluir($obj){
			try{
				$cx = new conexao();
				$conn = $cx->getConn();
				$login = $obj->getLogin();
				$senha = $obj->getSenha();
				$sql = "INSERT INTO administrador (login, senha) VALUES ('$login', '$senha')";
			    $conn->exec($sql);
			}
		    catch(PDOException $e){
		    	echo $sql . "<br>" . $e->getMessage();
			}
			$conn = null;
		}
	}
?>