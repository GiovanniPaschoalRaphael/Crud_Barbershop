<?php
    
	use Dompdf\Dompdf;

	require_once 'dompdf/autoload.inc.php';
    require_once("../../BLL/agendamentoBLL.php");

    $html = '<table border=1 style="background-color: #585858"';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<td style="text-align:center; color:white">Nome</td>';
    $html .= '<td style="text-align:center; color:white">Telefone</td>';
    $html .= '<td style="text-align:center; color:white">Serviço</td>';
    $html .= '<td style="text-align:center; color:white">Preço</td>';
    $html .= '<td style="text-align:center; color:white">Barbeiro</td>';
    $html .= '<td style="text-align:center; color:white">Horário</td>';
    $html .= '<td style="text-align:center; color:white">Quantidade de Comparecimento</td>';
    $html .= '</tr>';
    $html .= '</thead>';

    $abll=new agendamentoBLL();
    $inicio = null;
    $qnt_result_pg = null;
    $result = $abll->ListarHistoricoGeral($inicio, $qnt_result_pg);

    while($row = $result->fetch()){
    	$html .= '<tbody>';
    	$html .='<tr><td style="text-align:center; color:white">'.$row["nome_cli"] . "</td>";
    	$html .='<td style="text-align:center; color:white">'.$row["telefone_cli"] . "</td>";
    	$html .='<td style="text-align:center; color:white">'.$row["nome"] . "</td>";
    	$html .='<td style="text-align:center; color:white">'.$row["preco"] . "</td>";
    	$html .='<td style="text-align:center; color:white">'.$row["nome_func"] . "</td>";
    	$horario_format = $row["horario"];
    	$horario = date("d/m/Y H:i", strtotime($horario_format));
    	$html .='<td style="text-align:center; color:white">'.$horario . "</td>";
    	$html .='<td style="text-align:center; color:white">'.$row["qtd_comparecimento"] . "</td></tr>";
    	$html .= '</tbody>';
    }

    $html .= '</table>';

	$dompdf = new DOMPDF();

	$dompdf->load_html('
		<h1 style="text-align:center; color:#0174DF"> Relatório Geral </h1>
		'. $html . '
	');

	$dompdf->render();

	$dompdf->stream("
		relatorio_geral.pdf",
		array(
			"Attachment" => false
		)

	);
?>