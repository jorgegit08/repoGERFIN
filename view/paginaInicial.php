<?php

require '../assets/util/conexaoDB.php';
require '../model/Pagamento.class.php';
require '../model/Recebimento.class.php';
require '../assets/dataTable/dataTable.js';
require '../assets/util/manipulacaoDatas.php';

$pg=new Pagamento;
$r =new Recebimento;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="../css/style.css" rel="stylesheet">
	<link href="../css/styleEdicao.css" rel="stylesheet">
	<title>Gerfin</title>
</head>

<body>      

	<?php require 'menu.php';
		$dataInicial = date("Y-m-01");
		$dataFinal = date("Y-m-t");
	?>

	<div class="pesq pesqTitulo borda" style="height: 50px">
		<h2 class="alinhaElementoCentro">Bem vindo ao Gerenciador Financeiro</h2>
	</div>

	<div class="pesq pesqBloco1 borda">
		<h2 class="alinhaElementoCentroTopo" style="width: 500px">Pagamentos pendentes <?=$mesAtual?></h2>
		<hr>
		<table class="tblDataTableResumido stripe" class="display" style="width:100%">
			<thead style="font-weight: bold">
			<tr style="height: 60px">
				<td>Descrição</td>
				<td>Tipo de pagamento</td>
				<td>Data Vencimento</td>
				<td>Valor</td>
			</tr>
			</thead>
			<tbody>
			<?php
				foreach($pg->listarPagamentosPendentesPorPeriodo($dataInicial,$dataFinal) as $registroAtual){
					echo "<tr>";
					
						echo "<td>".utf8_encode($registroAtual['txtDescricao'])."</td>";
						echo "<td>".utf8_encode($registroAtual['desctppagamento'])."</td>";
						echo "<td>".$registroAtual['datVencimento']."</td>";
						echo "<td>".$registroAtual['vlrValor']."</td>";

					echo "</tr>";
				}
			?>
			</tbody>	
		</table>
	</div>

	<div class="pesq pesqBloco2 borda">
		<h2 class="alinhaElementoCentroTopo" style="width: 500px">Recebimentos <?=$mesAtual?></h2>
		<hr>
		
		<table class="tblDataTableResumido stripe" class="display" style="width:100%">
			<thead style="font-weight: bold">
			<tr style="height: 60px">
				<td>Num da NFe</td>	
				<td>Cliente</td>
				<td>Tipo de Recebimento</td>
				<td>Valor Líquido</td>	
			</tr>
			</thead>

			<tbody>
			<?php

			foreach($r->listarRecebimentosPorPeriodo($dataInicial,$dataFinal) as $registroAtual){
				echo "<tr>";

					echo "<td>".$registroAtual['numNFe']."</td>";
					echo "<td>".$registroAtual['txtRazaoSocial']."</td>";
					echo "<td>".$registroAtual['desctpRecebimento']."</td>";
					echo "<td>".$registroAtual['vlrLiquidoFormatado']."</td>";

				echo "</tr>";
			}

			?>
			</tbody>	
		</table>
	</div>

</body>
</html>