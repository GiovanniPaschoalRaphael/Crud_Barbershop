<?php
	require_once("../../DAL/funcionarioDAL.php");

	class funcionarioBLL{
		public function Incluir($obj){
			if($obj->getNomefunc()=="")
				return false;
			else if($obj->getTelefonefunc()=="")
				return false;
			else if($obj->getEmailfunc()=="")
				return false;
			else{
				$obj2=new funcionarioDAL();
				$obj2->Incluir($obj);
				return true;
			}
		}

		public function Excluir($id){
			if($id=="")
				return false;
			else{
				$obj=new funcionarioDAL();
				$obj->Excluir($id);
				return true;
			}
		}

		public function Alterar($obj, $id){
			if($id=="")
				return false;
			else{
				$obj2 = new funcionarioDAL();
				$obj2->Alterar($obj, $id);
				return true;
			}
		}

		public function Listar(){
			$obj=new funcionarioDAL();
			$result = $obj->Listar();
			return $result;
		}

		public function ProcurarId($id){
			if($id=="")
				return false;
			else{
				$obj= new funcionarioDAL();
				$result = $obj->ProcurarId($id);
				return $result;
			}
		}

		public function ResultadoProcurarFuncionario($n){
			if($n=="")
				return false;
			else{
				$obj= new funcionarioDAL();
				$result = $obj->ResultadoProcurarFuncionario($n);
				return $result;
			}
		}

		public function AutoCompleteProcurarFuncionario($l){
			if($l=="")
				return false;
			else{
				$obj= new funcionarioDAL();
				$result = $obj->AutoCompleteProcurarFuncionario($l);
				return $result;
			}
		}
	}
?>