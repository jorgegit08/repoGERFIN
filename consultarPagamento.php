<?php
require 'conexaoDB.php';
require 'Pagamento.class.php';
require 'assets/dataTable/dataTable.js';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="css/style.css" rel="stylesheet">
	<title>Menu</title>
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
		
	</script>	

	<h1 class="tit">Pagamentos</h1>
	<?php require 'menu.php';?>
	
	<div style="display: flex; margin-left: 270px;">
		<img src="/TCC/assets/Icons/adicionar.png" title="Cadastrar Pagamento" style="cursor: hand; width: 40px; height: 40px;" onclick="cadastrarPagamento()"> Cadastrar Pagamento
	</div>
	
	<div class="pesq" style="background-color: #fff; width: 100%">
		
		<table id="tblDataTable" class="display" style="width:100%">
			<thead>
			<TR>
				<td>Descrição</td>
				<td>Tipo de pagamento</td>
				<td>Data Vencimento</td>
				<td>Data Pagamento</td>
				<td>Valor</td>
				<td>Ações</td>
			</TR>
			</thead>
			<tbody>

			<?php
				$pg= new Pagamento;
				//idPagamento	idTipoPagamento	txtDescricao	datVencimento	datPagamento	vlrValor
				foreach($pg->listarPagamentos() as $registroAtual){
					echo "<tr>";

					echo "<td>".$registroAtual['txtDescricao']."</td>";
					echo "<td>".$registroAtual['desctppagamento']."</td>";
					echo "<td>".$registroAtual['datVencimento']."</td>";
					echo "<td>".$registroAtual['datPagamento']."</td>";
					echo "<td>".$registroAtual['vlrValor']."</td>";
					echo "<td>".
						
						"<img src='/TCC/assets/Icons/editar.png' title='Alterar Pagamento' style='cursor: hand; width: 25px; height: 25px;' onclick='alterarPagamento(".$registroAtual['idPagamento'].",".$registroAtual['idTipoPagamento'].")'>".
						"<img src='/TCC/assets/Icons/excluir.png' title='Excluir Pagamento' style='cursor: hand; width: 25px; height: 25px;' onclick='excluirPagamento(".$registroAtual['idPagamento'].",".$registroAtual['idTipoPagamento'].")'>".
					
					"</td>";

					echo "</tr>";
				}
			?>
			</tbody>	
		</table>
	</div>

</body>
</html>