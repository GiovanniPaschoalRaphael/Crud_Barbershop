<?php
	require_once("../../BLL/agendamentoBLL.php");
	require_once("../../MODEL/agendamentoMODEL.class.php");

	$id_agendamento=$_GET["id_agendamento"];
	$obj=new agendamento();
	$obj->setComparece('N');
	$obj->setHistorico('S');
	$obj2=new agendamentoBLL();

	if($obj2->RetirarFilaNC($obj, $id_agendamento)){
		if(false)
			echo '<script> alert ("Falha em não comparecer o cliente!"); location.href=("../paginas/filadeclientes.php")</script>';
		else
			echo '<script> location.href=("../paginas/filadeclientes.php")</script>';
	}
?>