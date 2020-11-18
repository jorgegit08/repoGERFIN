<?php
require 'conexaoDB.php';
require 'Recebimento.class.php';
require 'assets/dataTable/dataTable.js';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="css/style.css" rel="stylesheet">
	<title>Gerfin</title>
</head>

<body>
	
	<script language="javascript">
		function alterarRecebimento(idRecebimento,idTipoRecebimento,idCliente){
			window.location.href='alterarRecebimento.php?idRecebimento='+idRecebimento+'&idTipoRecebimento='+idTipoRecebimento+'&idCliente='+idCliente;
		}

		function excluirRecebimento(idRecebimento,idTipoRecebimento,idCliente){
			window.location.href='excluirRecebimento.php?idRecebimento='+idRecebimento+'&idTipoRecebimento='+idTipoRecebimento+'&idCliente='+idCliente;
		}
		
		function cadastrarRecebimento(){
			window.location.href='cadastrarRecebimento.php';
		}

		function filtrarDadosRecebimento(){
			
			dataInicial = document.getElementById("datInicial").value;
			datFinal = document.getElementById("datFinal").value;

			if( datFinal < dataInicial){
				alert("A data Final não ser inferior a inicial")
				return false;
			}else{
				document.getElementById("filtroRecebimento").submit();
			}
			
		}
		
	</script>	

	<h1 class="tit">Recebimentos</h1>
	<?php require 'menu.php';
		require 'assets/jquery/jQuery-Mask-Plugin-master/jQueryMascara.php';
	
		if( isset($_POST['datInicial']) && !empty($_POST['datInicial']) && $_POST['datFinal'] && !empty($_POST['datFinal']) ){
			$dataInicial = $_POST['datInicial'];
			$dataFinal = $_POST['datFinal'];
		}else{
			$dataInicial = date("Y-m-01");
			$dataFinal = date("Y-m-t");
		}
		
	?>

	
	<form id="filtroRecebimento" name="filtroRecebimento" method="POST" action="">
		<div class="pesq margemBaixo30 pesqFiltro altura200 alinhaElementoCentro borda" align="center">
			<h2 class="margemBaixo30">Selecione o período dos recebimentos</h2>

			<label for="datInicial" class="alinhaLabel">Data Inicial:</label>
			<input id="datInicial" name="datInicial" required="required" type="date" value="<?=$dataInicial?>" />
			
			<label for="datFinal" class="alinhaLabel">Data Final:</label>
			<input id="datFinal" name="datFinal" required="required" type="date" value="<?=$dataFinal?>" />
			
			<div class="margemCima30">
				<button class="botaoCadastro" style="float: none" title="Buscar" onclick="filtrarDadosRecebimento()">Buscar</button>
			</div>
		</div>
	</form>

	<div class="divBotaoCadastro">
		<button class="botaoCadastro" title="Cadastrar Recebimento" onclick="cadastrarRecebimento()"><img src="assets/Icons/greenPlus.png" id="imgCadastro"> Cadastrar Recebimento</button>
	</div>
	
	<div class="pesq pesqTabela" style="background-color: #fff; width: 100%">
		
		<table id="tblDataTable" class="display" style="width:100%">
			<thead>
			<TR>
				<td>Cliente</td>
				<td>Contrato</td>
				<td>Gestor</td>
				<td>Tipo de Recebimento</td>
				<td>Descrição</td>
				<td>Valor Bruto</td>
				<td>Valor Líquido</td>
				<td>Data Emissão</td>
				<td>Data Vencimento</td>
				<td>Data Pagamento</td>
				<td>Num da NFe</td>
				<td>Situação</td>
				<td>Ações</td>
			</TR>
			</thead>
			<tbody>

			<?php
				$rm= new Recebimento;
								
				foreach($rm->listarRecebimentosPorPeriodo($dataInicial,$dataFinal) as $registroAtual){
					echo "<tr>";

					echo "<td>".$registroAtual['txtRazaoSocial']."</td>";
					echo "<td>".$registroAtual['txtContrato']."</td>";
					echo "<td>".$registroAtual['txtGestor']."</td>";
					echo "<td>".$registroAtual['desctpRecebimento']."</td>";
					echo "<td>".$registroAtual['txtDescricao']."</td>";
					echo "<td>".$registroAtual['vlrBrutoFormatado']."</td>";
					echo "<td>".$registroAtual['vlrLiquidoFormatado']."</td>";
					echo "<td>".$registroAtual['datEmissao']."</td>";
					echo "<td>".$registroAtual['datVencimento']."</td>";
					echo "<td>".$registroAtual['datPagamento']."</td>";
					echo "<td>".$registroAtual['numNFe']."</td>";
					echo "<td>".$registroAtual['txtDescSituacao']."</td>";
					
					echo "<td>".
						
						"<img src='/TCC/assets/Icons/editar.png' title='Alterar Recebimento' id='btnAlterar' onclick='alterarRecebimento(".$registroAtual['idRecebimento'].",".$registroAtual['idTipoRecebimento'].",".$registroAtual['idCliente'].")'>".
						"<img src='/TCC/assets/Icons/excluir.png' title='Excluir Recebimento' id='btnExcluir' onclick='excluirRecebimento(".$registroAtual['idRecebimento'].",".$registroAtual['idTipoRecebimento'].",".$registroAtual['idCliente'].")'>".
					
					"</td>";

					echo "</tr>";
				}
			?>
			</tbody>	
		</table>
	</div>

</body>
</html>