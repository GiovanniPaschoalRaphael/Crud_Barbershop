<?php
	require_once("../../BLL/funcionarioBLL.php");
	require_once("../../MODEL/funcionarioMODEL.class.php");

	$id_funcionario=$_POST["id_funcionario"];
	$nome_func=$_POST["nome_func"];
	$telefone_func=$_POST["telefone_func"];
	$email_func=$_POST["email_func"];

	$obj=new funcionario();
	$obj->setNomefunc($nome_func);
	$obj->setTelefonefunc($telefone_func);
	$obj->setEmailfunc($email_func);

	$obj2=new funcionarioBLL();
	if($obj2->Alterar($obj, $id_funcionario)){
		if(false)
			echo '<script> alert ("Falha na alteração!"); location.href=("../paginas/tabelafuncionario.php")</script>';
		else
			echo '<script> alert ("Alteração realizada com sucesso!"); location.href=("../paginas/tabelafuncionario.php")</script>';
	}
?>