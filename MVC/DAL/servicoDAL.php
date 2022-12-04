<?php
	require_once("conexao.class.php");
	require_once("../../MODEL/servicoMODEL.class.php");

	class servicoDAL{

		public function Incluir($obj){
			try{
				$cx = new conexao();
				$conn = $cx->getConn();
				$nome = $obj->getNome();
				$preco = $obj->getPreco();
				$sql = "INSERT INTO servico (nome, preco) VALUES ('$nome', $preco)";
			    $conn->exec($sql);
			}
		    catch(PDOException $e){
		    	echo $sql . "<br>" . $e->getMessage();
			}
			$conn = null;
		}

		public function Excluir($id){
			try{
				$cx = new conexao();
				$conn = $cx->getConn();
				$sql = "DELETE FROM servico WHERE id_servico=$id";
			    $conn->exec($sql);
			}
		    catch(PDOException $e){
		    	echo $sql . "<br>" . $e->getMessage();
			}
			$conn = null;
		}

		public function Alterar($obj, $id_referido){
			try{
				$cx = new conexao();
				$conn = $cx->getConn();
				$id_servico = $obj->getIdservico();
				$nome = $obj->getNome();
				$preco = $obj->getPreco();
				$sql = "UPDATE servico SET nome='$nome', preco=$preco WHERE id_servico=$id_referido";
			    $conn->exec($sql);
			}
		    catch(PDOException $e){
		    	echo $sql . "<br>" . $e->getMessage();
			}
			$conn = null;
		}

		public function Listar(){
			try{
            	$cx = new Conexao();
            	$conn = $cx->getConn();
            	$sql = "SELECT * FROM servico ORDER BY nome";
            	$result = $conn->query($sql);
            	return $result;
        	}
    		catch(PDOException $e){
        		echo $sql . "<br>" . $e->getMessage();
    		}
    		$conn = null;
		}

		public function ProcurarId($id){
			try{
            	$cx = new Conexao();
            	$conn = $cx->getConn();
            	$sql = "SELECT * FROM servico WHERE id_servico=$id";
            	$result = $conn->query($sql);
            	return $result;
        	}
    		catch(PDOException $e){
        		echo $sql . "<br>" . $e->getMessage();
    		}
    		$conn = null;
		}

		public function ResultadoProcurarServico($n){
			try{
            	$cx = new Conexao();
            	$conn = $cx->getConn();
            	$sql = "SELECT * FROM servico WHERE nome LIKE '%$n%' ORDER BY nome";
            	$result = $conn->query($sql);
            	return $result;
        	}
    		catch(PDOException $e){
        		echo $sql . "<br>" . $e->getMessage();
    		}
    		$conn = null;
		}

		public function AutoCompleteProcurarServico($l){
			try{
            	$cx = new Conexao();
            	$conn = $cx->getConn();
            	$sql = "SELECT DISTINCT nome FROM servico WHERE nome LIKE '%$l%' ORDER BY nome ASC";
            	$result = $conn->query($sql);
            	return $result;
        	}
    		catch(PDOException $e){
        		echo $sql . "<br>" . $e->getMessage();
    		}
    		$conn = null;
		}
	}
?>