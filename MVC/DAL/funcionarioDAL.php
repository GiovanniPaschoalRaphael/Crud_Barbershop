<?php
	require_once("conexao.class.php");
	require_once("../../MODEL/funcionarioMODEL.class.php");

	class funcionarioDAL{

		public function Incluir($obj){
			try{
				$cx = new conexao();
				$conn = $cx->getConn();
				$nome_func = $obj->getNomefunc();
				$telefone_func = $obj->getTelefonefunc();
				$email_func = $obj->getEmailfunc();
				$sql = "INSERT INTO funcionario (nome_func, telefone_func, email_func) VALUES ('$nome_func', '$telefone_func', '$email_func')";
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
				$sql = "DELETE FROM funcionario WHERE id_funcionario=$id";
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
				$id_funcionario = $obj->getIdfuncionario();
				$nome_func = $obj->getNomefunc();
				$telefone_func = $obj->getTelefonefunc();
				$email_func = $obj->getEmailfunc();
				$sql = "UPDATE funcionario SET nome_func='$nome_func', telefone_func='$telefone_func', email_func='$email_func' WHERE id_funcionario=$id_referido";
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
            	$sql = "SELECT * FROM funcionarios_cadastrados";
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
            	$sql = "SELECT * FROM funcionario WHERE id_funcionario=$id";
            	$result = $conn->query($sql);
            	return $result;
        	}
    		catch(PDOException $e){
        		echo $sql . "<br>" . $e->getMessage();
    		}
    		$conn = null;
		}

		public function ResultadoProcurarFuncionario($n){
			try{
            	$cx = new Conexao();
            	$conn = $cx->getConn();
            	$sql = "SELECT * FROM funcionario WHERE nome_func LIKE '%$n%' ORDER BY nome_func";
            	$result = $conn->query($sql);
            	return $result;
        	}
    		catch(PDOException $e){
        		echo $sql . "<br>" . $e->getMessage();
    		}
    		$conn = null;
		}

		public function AutoCompleteProcurarFuncionario($l){
			try{
            	$cx = new Conexao();
            	$conn = $cx->getConn();
            	$sql = "SELECT DISTINCT nome_func FROM funcionario WHERE nome_func LIKE '%$l%' ORDER BY nome_func ASC";
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