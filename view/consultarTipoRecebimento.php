<?php
require '../assets/util/conexaoDB.php';
require '../model/TipoRecebimento.class.php';
require '../assets/dataTable/dataTable.js';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="../css/style.css" rel="stylesheet">
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
	
	<div class="divBotaoCadastro">
		<button class="botaoCadastro" title="Cadastrar Tipo de Recebimento" onclick="cadastrarTipoRecebimento()"><img src="../assets/Icons/greenPlus.png" id="imgCadastro"> Cadastrar Tipo de Recebimento</button>
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
					echo "<td>".utf8_encode( $registroAtual['txtDescricao'] )."</td>";
					echo "<td>".
						
						"<img src='/TCC/assets/Icons/editar.png' title='Alterar Tipo de Recebimento' id='btnAlterar' onclick='alterarTipoRecebimento(".$registroAtual['idTipoRecebimento'].")'>".
						"<img src='/TCC/assets/Icons/excluir.png' title='Excluir Tipo de Recebimento' id='btnExcluir' onclick='excluirTipoRecebimento(".$registroAtual['idTipoRecebimento'].")'>".
					
					"</td>";

					echo "</tr>";
				}
			?>
			</tbody>	
		</table>
	</div>

</body>
</html>