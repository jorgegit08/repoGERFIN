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
		
	</script>	

	<h1 class="tit">Recebimentos</h1>
	<?php require 'menu.php';?>

	
	<div style="display: flex; margin-left: 270px;">
		<img src="/TCC/assets/Icons/adicionar.png" title="Cadastrar Recebimento" style="cursor: hand; width: 40px; height: 40px;" onclick="cadastrarRecebimento()"> Cadastrar Recebimento
	</div>
	
	<div class="pesq" style="background-color: #fff; width: 100%">
		
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
				<td>Data Vencimento</td>
				<td>Data Recebimento</td>
				<td>Num da NFe</td>
				<td>Ações</td>
			</TR>
			</thead>
			<tbody>

			<?php
				$rm= new Recebimento;
				//idRecebimento	idTipoRecebimento	txtDescricao	datVencimento	datRecebimento	vlrValor
				foreach($rm->listarRecebimentos() as $registroAtual){
					echo "<tr>";

					echo "<td>".$registroAtual['txtRazaoSocial']."</td>";
					echo "<td>".$registroAtual['txtContrato']."</td>";
					echo "<td>".$registroAtual['txtGestor']."</td>";
					echo "<td>".$registroAtual['desctpRecebimento']."</td>";
					echo "<td>".$registroAtual['txtDescricao']."</td>";
					echo "<td>".$registroAtual['vlrBruto']."</td>";
					echo "<td>".$registroAtual['vlrLiquido']."</td>";
					echo "<td>".$registroAtual['datVencimento']."</td>";
					echo "<td>".$registroAtual['datPagamento']."</td>";
					echo "<td>".$registroAtual['numNFe']."</td>";
					
					echo "<td>".
						
						"<img src='/TCC/assets/Icons/editar.png' title='Alterar Recebimento' style='cursor: hand; width: 25px; height: 25px;' onclick='alterarRecebimento(".$registroAtual['idRecebimento'].",".$registroAtual['idTipoRecebimento'].",".$registroAtual['idCliente'].")'>".
						"<img src='/TCC/assets/Icons/excluir.png' title='Excluir Recebimento' style='cursor: hand; width: 25px; height: 25px;' onclick='excluirRecebimento(".$registroAtual['idRecebimento'].",".$registroAtual['idTipoRecebimento'].",".$registroAtual['idCliente'].")'>".
					
					"</td>";

					echo "</tr>";
				}
			?>
			</tbody>	
		</table>
	</div>

</body>
</html>