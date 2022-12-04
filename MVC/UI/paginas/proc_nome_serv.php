<?php
	session_start();
	require_once('../verificalogin/verificalogin.php');
	require_once("../../BLL/servicoBLL.php");

	$letra_ajuda = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

	$obj = new servicoBLL();
	$result = $obj->AutoCompleteProcurarServico($letra_ajuda);

	while($row = $result->fetch()){
		$data[] = $row['nome'];
	}

	echo json_encode($data);
?>