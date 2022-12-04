<?php
	require_once("conexao.class.php");
	require_once("../../MODEL/clienteMODEL.class.php");

	class clienteDAL{

		public function ConfAgend($obj){
			try{
				$cx = new conexao();
				$conn = $cx->getConn();
				$nome_cli = $obj->getNomecli();
				$telefone_cli = $obj->getTelefonecli();
				$sql = "INSERT INTO cliente (nome_cli, telefone_cli) VALUES ('$nome_cli', '$telefone_cli')";
			    $conn->exec($sql);
			}
		    catch(PDOException $e){
		    	echo $sql . "<br>" . $e->getMessage();
			}
			$conn = null;
		}

		public function PegarIdCliente(){
			try{
				$cx = new Conexao();
				$conn = $cx->getConn();
				$sql = "SELECT id_cliente FROM cliente ORDER BY id_cliente DESC LIMIT 1";
				$result = $conn->query($sql);
				while ($row = $result->fetch()) {
				    $resultfinal = $row["id_cliente"];
				}
				return $resultfinal;
			}
		    catch(PDOException $e){
		    	echo $sql . "<br>" . $e->getMessage();
			}
			$conn = null;
		}
	}
?>