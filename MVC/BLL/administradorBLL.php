<?php
	require_once("../../DAL/administradorDAL.php");

	class administradorBLL{
		public function Incluir($obj){
			if($obj->getLogin()=="")
				return false;
			else if($obj->getSenha()=="")
				return false;
			else
				$obj2=new administradorDAL();
				$obj2->Incluir($obj);
				return true;
		}
	}
?>