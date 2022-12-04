<?php
	require_once("../../BLL/servicoBLL.php");

	$id_servico=$_GET["id_servico"];

	$obj=new servicoBLL();

	if($obj->Excluir($id_servico)){
		if(false)
			echo '<script> alert ("Falha na exclusão do serviço!"); location.href=("../paginas/tabelaservico.php")</script>';
		else
			echo '<script> location.href=("../paginas/tabelaservico.php")</script>';
	}
?>