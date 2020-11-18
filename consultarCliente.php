<?php
require 'conexaoDB.php';
require 'Cliente.class.php';
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
		function alterarCliente(idCliente){
			window.location.href='alterarCliente.php?idCliente='+idCliente;
		}

		function excluirCliente(idCliente){
			window.location.href='excluirCliente.php?idCliente='+idCliente;
		}
		
		function cadastrarCliente(){
			window.location.href='cadastrarCliente.php';
		}
		
	</script>	

	<h1 class="tit">Clientes</h1>
	<?php require 'menu.php';?>
		
	<div class="divBotaoCadastro">
		<button class="botaoCadastro" title="Cadastrar Cliente" onclick="cadastrarCliente()"><img src="assets/Icons/greenPlus.png" id="imgCadastro"> Cadastrar Cliente</button>
	</div>
	
	<div class="pesq pesqTabela">
		
		<table id="tblDataTable" class="display" style="width:100%">
			<thead>
			<TR>
				<td>Razão social</td>
				<td>CPF/CNPJ</td>
				<td>Inscrição</td>
				<td>endereço</td>
				<td>Telefone</td>
				<td>Responsável</td>
				<td>E-mail</td>
				<td>Ações</td>
			</TR>
			</thead>
			<tbody>

			<?php
				$c= new Cliente;
				
				foreach($c->listarClientes() as $registroAtual){
					echo "<tr>";

					echo "<td>".$registroAtual['txtRazaoSocial']."</td>";
					echo "<td>".$registroAtual['txtCNPJ']."</td>";
					echo "<td>".$registroAtual['txtInscricaoEstadual']."</td>";
					echo "<td>".$registroAtual['txtEndereco']."</td>";
					echo "<td>".$registroAtual['txtTelefone']."</td>";
					echo "<td>".$registroAtual['txtContatoDireto']."</td>";
					echo "<td>".$registroAtual['txtEmail']."</td>";
					echo "<td>".
						
						"<img src='/TCC/assets/Icons/editar.png' title='Alterar Cliente' id='btnAlterar' onclick='alterarCliente(".$registroAtual['idCliente'].")'>".
						"<img src='/TCC/assets/Icons/excluir.png' title='Excluir Cliente' id='btnExcluir' onclick='excluirCliente(".$registroAtual['idCliente'].")'>".
					
					"</td>";

					echo "</tr>";
				}
			?>
			</tbody>	
		</table>
	</div>

</body>
</html>