<?php
	session_start();
	require_once('../verificalogin/verificalogin.php');
	require_once("../../BLL/agendamentoBLL.php");

	$letra_ajuda = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

	$obj = new agendamentoBLL();
	$result = $obj->AutoCompleteProcurarPorFuncionario($letra_ajuda);

	while($row = $result->fetch()){
		$data[] = $row['nome_func'];
	}

	echo json_encode($data);
?>