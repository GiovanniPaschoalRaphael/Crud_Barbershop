<?php
	require_once("../../BLL/agendamentoBLL.php");
	require_once("../../MODEL/agendamentoMODEL.class.php");

	$id_agendamento=$_GET["id_agendamento"];
	$obj=new agendamento();
	$obj->setComparece('S');
	$obj->setHistorico('S');
	$obj2=new agendamentoBLL();

	if($obj2->RetirarFila($obj, $id_agendamento)){
		if(false)
			echo '<script> alert ("Falha em comparecer o cliente!"); location.href=("../paginas/filadeclientes.php")</script>';
		else{
			$cliente = $obj2->PegarDadosClienteAgendamento($id_agendamento);
			while($row = $cliente->fetch()){
				$nome_cli = $row["nome_cli"];
				$qtd_comparecimento_desse_cliente = $row["qtd_comparecimento"];
			}
			$cliente = $obj2->QtdVezesClienteEstaHistorico($nome_cli);
			$qtd_vezes_cliente_esta_historico = $cliente["qtd_vezes_cliente_esta_historico"];
			if($qtd_vezes_cliente_esta_historico > 1){
				$cliente = $obj2->ContarQtdComparecimento($nome_cli);
				while($row = $cliente->fetch())
					$qtd_comparecimento_desse_cliente_historico = $row["qtd_comparecimento"];
				$qtd_comparecimento_final = $qtd_comparecimento_desse_cliente + $qtd_comparecimento_desse_cliente_historico;
				if($obj2->AtualizarQtdComparecimento($qtd_comparecimento_final, $nome_cli)){
					if(false)
						echo '<script> alert ("Falha em atualizar a quantidade de comparecimento do cliente!"); location.href=("../paginas/filadeclientes.php")</script>';
				}
			}
			echo '<script> location.href=("../paginas/filadeclientes.php")</script>';
		}
	}
?>