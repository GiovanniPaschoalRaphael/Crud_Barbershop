<?php
	require_once("../../BLL/funcionarioBLL.php");

	$id_funcionario=$_GET["id_funcionario"];

	$obj=new funcionarioBLL();

	if($obj->Excluir($id_funcionario)){
		if(false)
			echo '<script> alert ("Falha na demissão do funcionário!"); location.href=("../paginas/tabelafuncionario.php")</script>';
		else
			echo '<script> location.href=("../paginas/tabelafuncionario.php")</script>';
	}
?>