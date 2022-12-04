<?php
	session_start();
	require_once("../../BLL/administradorBLL.php");
	require_once("../../MODEL/administradorMODEL.class.php");

	$login=$_POST["login"];
	$senha=$_POST["senha"];

	$obj=new administrador();
	$obj->setLogin();
	$obj->setSenha();

	if($obj->getLogin()==$login && $obj->getSenha()==$senha){
		$_SESSION['login'] = $login;
		echo '<script> location.href=("../paginas/AreaAdministradorLob.php")</script>';
	}
	else
		echo '<script> alert ("Login ou senha incorretos!"); location.href=("../paginas/LoginAdm.php")</script>';
?>