<?php
	session_start();
	require_once('../verificalogin/verificalogin.php');
	require_once("../../BLL/funcionarioBLL.php");

	$letra_ajuda = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

	$obj = new funcionarioBLL();
	$result = $obj->AutoCompleteProcurarFuncionario($letra_ajuda);

	while($row = $result->fetch()){
		$data[] = $row['nome_func'];
	}

	echo json_encode($data);
?>