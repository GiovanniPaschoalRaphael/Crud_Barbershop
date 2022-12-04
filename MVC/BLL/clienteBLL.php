<?php
	require_once("../../DAL/clienteDAL.php");

	class clienteBLL{
		public function ConfAgend($obj){
			if($obj->getNomecli()=="")
				return false;
			else if($obj->getTelefonecli()=="")
				return false;
			else{
				$obj2=new clienteDAL();
				$obj2->ConfAgend($obj);
				return true;
			}
		}

		public function PegarIdCliente(){
			$obj=new clienteDAL();
			$result=$obj->PegarIdCliente();
			return $result;
		}
	}
?>