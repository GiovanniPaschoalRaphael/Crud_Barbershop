<?php
	require_once("../../DAL/servicoDAL.php");

	class servicoBLL{
		public function Incluir($obj){
			if($obj->getNome()=="")
				return false;
			else if($obj->getPreco()=="")
				return false;
			else{
				$obj2=new servicoDAL();
				$obj2->Incluir($obj);
				return true;
			}
		}

		public function Excluir($id){
			if($id=="")
				return false;
			else{
				$obj=new servicoDAL();
				$obj->Excluir($id);
				return true;
			}
		}

		public function Alterar($obj, $id){
			if($id=="")
				return false;
			else{
				$obj2 = new servicoDAL();
				$obj2->Alterar($obj, $id);
				return true;
			}
		}

		public function Listar(){
			$obj=new servicoDAL();
			$result = $obj->Listar();
			return $result;
		}

		public function ProcurarId($id){
			if($id=="")
				return false;
			else{
				$obj= new servicoDAL();
				$result = $obj->ProcurarId($id);
				return $result;
			}
		}

		public function ResultadoProcurarServico($n){
			if($n=="")
				return false;
			else{
				$obj= new servicoDAL();
				$result = $obj->ResultadoProcurarServico($n);
				return $result;
			}
		}

		public function AutoCompleteProcurarServico($l){
			if($l=="")
				return false;
			else{
				$obj= new servicoDAL();
				$result = $obj->AutoCompleteProcurarServico($l);
				return $result;
			}
		}
	}
?>