<?php
	require_once("../../BLL/clienteBLL.php");
	require_once("../../MODEL/clienteMODEL.class.php");
	require_once("../../BLL/agendamentoBLL.php");
	require_once("../../MODEL/agendamentoMODEL.class.php");

	$nome_cli=$_POST["nome_cli"];
	$telefone_cli=$_POST["telefone_cli"];

	$objc=new cliente();
	$objc->setIdcliente();
	$objc->setNomecli($nome_cli);
	$objc->setTelefonecli($telefone_cli);

	$objc2=new clienteBLL();

	if($objc2->ConfAgend($objc)){
		if(false)
			echo '<script> alert ("Falha no agendamento! Algum(s) campo(s) inválido(s)!"); location.href=("../paginas/AreaDoCliente.php")</script>';
		else{
			$data=$_POST["data"];
			$hora=$_POST["hora"];
			$data_final = implode('-', array_reverse(explode('/', $data)));
			$horario=$data_final." ".$hora;
			$funcionario_id_funcionario=$_POST["funcionario_id_funcionario"];
			$servico_id_servico=$_POST["servico_id_servico"];

			$obja=new agendamento();
			$obja->setIdagendamento();
			$obja->setHorario($horario);
			$obja->setComparece("S");
			$obja->setHistorico("N");
			$codigo_id_cliente=$objc2->Pegaridcliente();
			$obja->setClienteidcliente($codigo_id_cliente);
			$obja->setFuncionarioidfuncionario($funcionario_id_funcionario);
			$obja->setServicoidservico($servico_id_servico);
			$obja2=new agendamentoBLL();

			if($obja2->ConfAgend($obja)){
				if(false)
					echo '<script> alert ("Falha no agendamento! Algum(s) campo(s) inválido(s)!"); location.href=("../paginas/AreaDoCliente.php")</script>';
				else
					echo '<script> alert ("Agendamento realizado com sucesso!"); location.href=("../paginas/index.php")</script>';
			}
		}
	}
?>