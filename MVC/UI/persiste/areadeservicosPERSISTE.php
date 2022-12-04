<?php
	require_once("../../BLL/servicoBLL.php");
	require_once("../../MODEL/servicoMODEL.class.php");

	$nome=$_POST["nome"];
	$preco=$_POST["preco"];

	$obj=new servico();
	$obj->setIdservico();
	$obj->setNome($nome);
	$obj->setPreco($preco);

	$obj2=new servicoBLL();
	if($obj2->Incluir($obj)){
		if(false)
			echo '<script> alert ("Falha no cadastro!"); location.href=("../paginas/AreaDeServicos.php")</script>';
		else
			echo '<script> alert ("Cadastro realizado com sucesso!"); location.href=("../paginas/AreaDeServicos.php")</script>';
	}
?>