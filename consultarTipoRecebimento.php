<?php
require 'conexaoDB.php';
require 'TipoRecebimento.class.php';
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
		function alterarTipoRecebimento(idTipoRecebimento){
			window.location.href='alterarTipoRecebimento.php?idTipoRecebimento='+idTipoRecebimento;
		}

		function excluirTipoRecebimento(idTipoRecebimento){
			window.location.href='excluirTipoRecebimento.php?idTipoRecebimento='+idTipoRecebimento;
		}
		
		function cadastrarTipoRecebimento(){
			window.location.href='cadastrarTipoRecebimento.php';
		}
		
	</script>	

	<h1 class="tit">Tipos de Recebimento</h1>
	<?php require 'menu.php';?>
	
	<div style="display: flex; margin-left: 270px;">
		<img src="/TCC/assets/Icons/adicionar.png" title="Cadastrar Tipo de Recebimento" style="cursor: hand; width: 40px; height: 40px;" onclick="cadastrarTipoRecebimento()"> Cadastrar tipo de Recebimento
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
				$tr= new TipoRecebimento;
				
				foreach($tr->listarTiposRecebimento() as $registroAtual){
					echo "<tr>";

					echo "<td>".$registroAtual['idTipoRecebimento']."</td>";
					echo "<td>".$registroAtual['txtDescricao']."</td>";
					echo "<td>".
						
						"<img src='/TCC/assets/Icons/editar.png' title='Alterar Tipo de Recebimento' style='cursor: hand; width: 25px; height: 25px;' onclick='alterarTipoRecebimento(".$registroAtual['idTipoRecebimento'].")'>".
						"<img src='/TCC/assets/Icons/excluir.png' title='Excluir Tipo de Recebimento' style='cursor: hand; width: 25px; height: 25px;' onclick='excluirTipoRecebimento(".$registroAtual['idTipoRecebimento'].")'>".
					
					"</td>";

					echo "</tr>";
				}
			?>
			</tbody>	
		</table>
	</div>

</body>
</html>