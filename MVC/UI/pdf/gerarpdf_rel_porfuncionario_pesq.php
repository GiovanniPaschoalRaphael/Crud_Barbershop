<?php

	use Dompdf\Dompdf;

	require_once 'dompdf/autoload.inc.php';
    require_once("../../BLL/agendamentoBLL.php");

    $html = '<table border=1 style="background-color: #585858"';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<td style="text-align:center; color:white">Nome</td>';
    $html .= '<td style="text-align:center; color:white">Telefone</td>';
    $html .= '<td style="text-align:center; color:white">E-mail</td>';
    $html .= '<td style="text-align:center; color:white">Nome do Cliente</td>';
    $html .= '<td style="text-align:center; color:white">Telefone</td>';
    $html .= '<td style="text-align:center; color:white">Serviço</td>';
    $html .= '<td style="text-align:center; color:white">Preço</td>';
    $html .= '<td style="text-align:center; color:white">Horário</td>';
    $html .= '<td style="text-align:center; color:white">Quantidade de Agendamento</td>';
    $html .= '</tr>';
    $html .= '</thead>';

    $letra=$_GET["letra"];
    $abll=new agendamentoBLL();
    if($abll->ResultadoProcurarHistoricoPorFuncionario($letra)){
        if(false)
            echo '<script> alert ("Falha ao procurar!"); </script>';
        else
            $result=$abll->ResultadoProcurarHistoricoPorFuncionario($letra);
    }

    while($row = $result->fetch()){
    	$html .= '<tbody>';
    	$html .='<tr><td style="text-align:center; color:white">'.$row["nome_func"] . "</td>";
    	$html .='<td style="text-align:center; color:white">'.$row["telefone_func"] . "</td>";
    	$html .='<td style="text-align:center; color:white">'.$row["email_func"] . "</td>";
    	$html .='<td style="text-align:center; color:white">'.$row["nome_cli"] . "</td>";
    	$html .='<td style="text-align:center; color:white">'.$row["telefone_cli"] . "</td>";
        $html .='<td style="text-align:center; color:white">'.$row["nome"] . "</td>";
        $html .='<td style="text-align:center; color:white">'.$row["preco"] . "</td>";
    	$horario_format = $row["horario"];
    	$horario = date("d/m/Y H:i", strtotime($horario_format));
    	$html .='<td style="text-align:center; color:white">'.$horario . "</td>";
    	$html .='<td style="text-align:center; color:white">'.$row["qtd_agendamento"] . "</td></tr>";
    	$html .= '</tbody>';
    }

    $html .= '</table>';

	$dompdf = new DOMPDF();

	$dompdf->load_html('
		<h1 style="text-align:center; color:#0174DF"> Relatório por Funcionário - Funcionários </h1>
		'. $html . '
	');

	$dompdf->render();

	$dompdf->stream("
		relatorio_por_funcionario.pdf",
		array(
			"Attachment" => false
		)

	);
?>