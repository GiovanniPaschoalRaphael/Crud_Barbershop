<?php
	require_once("../../BLL/servicoBLL.php");
	require_once("../../MODEL/servicoMODEL.class.php");

	$id_servico=$_POST["id_servico"];
	$nome=$_POST["nome"];
	$preco=$_POST["preco"];

	$obj=new servico();
	$obj->setNome($nome);
	$obj->setPreco($preco);

	$obj2=new servicoBLL();
	if($obj2->Alterar($obj, $id_servico)){
		if(false)
			echo '<script> alert ("Falha na alteração!"); location.href=("../paginas/tabelaservico.php")</script>';
		else
			echo '<script> alert ("Alteração realizada com sucesso!"); location.href=("../paginas/tabelaservico.php")</script>';
	}
?>