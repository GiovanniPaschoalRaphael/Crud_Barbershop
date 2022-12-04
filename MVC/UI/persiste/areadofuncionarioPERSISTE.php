<?php
	require_once("../../BLL/funcionarioBLL.php");
	require_once("../../MODEL/funcionarioMODEL.class.php");

	$nome_func=$_POST["nome_func"];
	$telefone_func=$_POST["telefone_func"];
	$email_func=$_POST["email_func"];

	$obj=new funcionario();
	$obj->setIdfuncionario();
	$obj->setNomefunc($nome_func);
	$obj->setTelefonefunc($telefone_func);
	$obj->setEmailfunc($email_func);

	$obj2=new funcionarioBLL();
	if($obj2->Incluir($obj)){
		if(false)
			echo '<script> alert ("Falha no cadastro!"); location.href=("../paginas/AreaDoFuncionario.php")</script>';
		else
			echo '<script> alert ("Cadastro realizado com sucesso!"); location.href=("../paginas/AreaDoFuncionario.php")</script>';
	}
?>