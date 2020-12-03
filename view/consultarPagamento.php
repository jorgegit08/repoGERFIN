<?php
require '../assets/util/conexaoDB.php';
require '../model/Pagamento.class.php';
require '../assets/dataTable/dataTable.js';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="../css/style.css" rel="stylesheet">
	<title>Gerfin</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
	
	<script language="javascript">
		function alterarPagamento(idPagamento,idTipoPagamento){
			window.location.href='alterarPagamento.php?idPagamento='+idPagamento+'&idTipoPagamento='+idTipoPagamento;
		}

		function excluirPagamento(idPagamento,idTipoPagamento){
			window.location.href='excluirPagamento.php?idPagamento='+idPagamento+'&idTipoPagamento='+idTipoPagamento;
		}
		
		function cadastrarPagamento(){
			window.location.href='cadastrarPagamento.php';
		}

		function filtrarDadosPagamento(){
			
			dataInicial = document.getElementById("datInicial").value;
			datFinal = document.getElementById("datFinal").value;

			if( datFinal < dataInicial){
				alert("A data Final não ser inferior a inicial")
				return false;
			}else{
				document.getElementById("filtroPagamento").submit();
			}
			
		}
		
	</script>	

	<h1 class="tit">Pagamentos</h1>
	<?php require 'menu.php';

		if( isset($_POST['datInicial']) && !empty($_POST['datInicial']) && $_POST['datFinal'] && !empty($_POST['datFinal']) ){
			$dataInicial = $_POST['datInicial'];
			$dataFinal = $_POST['datFinal'];
		}else{
			$dataInicial = date("Y-m-01");
			$dataFinal = date("Y-m-t");
		}

	?>
	
	<form id="filtroPagamento" name="filtroPagamento" method="POST" action="">
		<div class="pesq margemBaixo30 pesqFiltro altura200 borda tamanho800" align="center">
			<h2 class="margemBaixo30">Selecione o período dos pagamentos</h2>

			<label for="datInicial" class="alinhaLabel">Data Inicial:</label>
			<input id="datInicial" name="datInicial" required="required" type="date" value="<?=$dataInicial?>" />
			
			<label for="datFinal" class="alinhaLabel">Data Final:</label>
			<input id="datFinal" name="datFinal" required="required" type="date" value="<?=$dataFinal?>" />
			
			<div class="altura40">
				<button class="botaoCadastro" style="float: none" title="Buscar" onclick="filtrarDadosPagamento()">Buscar</button>
			</div>
		</div>
	</form>

	<div class="divBotaoCadastro">
		<button class="botaoCadastro" title="Cadastrar Pagamento" onclick="cadastrarPagamento()"><img src="../assets/Icons/greenPlus.png" id="imgCadastro"> Cadastrar Pagamento</button>
	</div>
	
	<div class="pesq pesqTabela">
		
		<table id="tblDataTable" class="display" style="width:100%">
			<thead>
			<TR>
				<td>Descrição</td>
				<td>Tipo de pagamento</td>
				<td>Data Vencimento</td>
				<td>Data Pagamento</td>
				<td>Valor</td>
				<td>NFe</td>
				<td>Ações</td>
			</TR>
			</thead>
			<tbody>

			<?php
				$pg= new Pagamento;

				foreach($pg->listarPagamentosPorPeriodo($dataInicial,$dataFinal) as $registroAtual){
					echo "<tr>";

					echo "<td>".utf8_encode($registroAtual['txtDescricao'])."</td>";
					echo "<td>".utf8_encode($registroAtual['desctppagamento'])."</td>";
					echo "<td>".$registroAtual['datVencimento']."</td>";
					echo "<td>".$registroAtual['datPagamento']."</td>";
					echo "<td>".$registroAtual['vlrValor']."</td>";
					echo "<td>".$registroAtual['numNFe']."</td>";
					echo "<td>".
						
						"<img src='/TCC/assets/Icons/editar.png' title='Alterar Pagamento' id='btnAlterar' onclick='alterarPagamento(".$registroAtual['idPagamento'].",".$registroAtual['idTipoPagamento'].")'>".
						"<img src='/TCC/assets/Icons/excluir.png' title='Excluir Pagamento' id='btnExcluir' onclick='excluirPagamento(".$registroAtual['idPagamento'].",".$registroAtual['idTipoPagamento'].")'>".
					
					"</td>";

					echo "</tr>";
				}
			?>
			</tbody>	
		</table>
	</div>

</body>
</html>