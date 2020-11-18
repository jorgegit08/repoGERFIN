<?php
require 'conexaoDB.php';
require 'TipoPagamento.class.php';
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
		function alterarTipoPagamento(idTipoPagamento){
			window.location.href='alterarTipoPagamento.php?idTipoPagamento='+idTipoPagamento;
		}

		function excluirTipoPagamento(idTipoPagamento){
			window.location.href='excluirTipoPagamento.php?idTipoPagamento='+idTipoPagamento;
		}
		
		function cadastrarTipoPagamento(){
			window.location.href='cadastrarTipoPagamento.php';
		}
		
	</script>	

	<h1 class="tit">Tipos de Pagamento</h1>
	<?php require 'menu.php';?>
	
	<div class="divBotaoCadastro">
		<button class="botaoCadastro" title="Cadastrar Tipo de pagamento" onclick="cadastrarTipoPagamento()"><img src="assets/Icons/greenPlus.png" id="imgCadastro"> Cadastrar tipo de pagamento</button>
	</div>
		
	<div class="pesq" style="background-color: #fff; width: 100%">
		
		<table id="tblDataTable" class="display" style="width:100%">
			<thead>
			<TR>
				<td>ID</td>
				<td>Descrição</td>
				<td>Ações</td>
			</TR>
			</thead>
			<tbody>

			<?php
				$tp= new TipoPagamento;
				
				foreach($tp->listarTiposPagamento() as $registroAtual){
					echo "<tr>";

					echo "<td>".$registroAtual['idTipoPagamento']."</td>";
					echo "<td>".$registroAtual['txtDescricao']."</td>";
					echo "<td>".
						
						"<img src='/TCC/assets/Icons/editar.png' title='Alterar Tipo de pagamento' id='btnAlterar' onclick='alterarTipoPagamento(".$registroAtual['idTipoPagamento'].")'>".
						"<img src='/TCC/assets/Icons/excluir.png' title='Excluir Tipo de pagamento' id='btnExcluir' onclick='excluirTipoPagamento(".$registroAtual['idTipoPagamento'].")'>".
					
					"</td>";

					echo "</tr>";
				}
			?>
			</tbody>	
		</table>
	</div>

</body>
</html>