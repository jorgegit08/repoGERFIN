<?php
require 'conexaoDB.php';
require 'Favorecido.class.php';
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
		function alterarFavorecido(idFavorecido){
			window.location.href='alterarFavorecido.php?idFavorecido='+idFavorecido;
		}

		function excluirFavorecido(idFavorecido){
			window.location.href='excluirFavorecido.php?idFavorecido='+idFavorecido;
		}
		
		function cadastrarFavorecido(){
			window.location.href='cadastrarFavorecido.php';
		}
		
	</script>	

	<h1 class="tit">Favorecidos</h1>
	<?php require 'menu.php';?>
	
	<div class="divBotaoCadastro">
		<button class="botaoCadastro" title="Cadastrar Favorecido" onclick="cadastrarFavorecido()"><img src="assets/Icons/greenPlus.png" id="imgCadastro"> Cadastrar Favorecido</button>
	</div>

	<div class="pesq pesqTabela">
		
		<table id="tblDataTable" class="display" style="width:100%">
			<thead>
			<TR>
				<td>Nome</td>
				<td>CPF</td>
				<td>datNascimento</td>
				<td>Email</td>
				<td>OAB</td>
				<td>Endereco</td>
				<td>Telefone</td>
				<td>Ações</td>
			</TR>
			</thead>
			<tbody>

			<?php
				$f= new Favorecido;
				
				foreach($f->listarFavorecidos() as $registroAtual){
					echo "<tr>";

					echo "<td>".$registroAtual['txtNome']."</td>";
					echo "<td>".$registroAtual['txtCPF']."</td>";
					echo "<td>".$registroAtual['datNascimento']."</td>";
					echo "<td>".$registroAtual['txtEmail']."</td>";
					echo "<td>".$registroAtual['txtOAB']."</td>";
					echo "<td>".$registroAtual['txtEndereco']."</td>";
					echo "<td>".$registroAtual['txtTelefone']."</td>";
					echo "<td>".
						
						"<img src='/TCC/assets/Icons/editar.png' title='Alterar Favorecido' id='btnAlterar' onclick='alterarFavorecido(".$registroAtual['idFavorecido'].")'>".
						"<img src='/TCC/assets/Icons/excluir.png' title='Excluir Favorecido' id='btnExcluir' onclick='excluirFavorecido(".$registroAtual['idFavorecido'].")'>".
					
					"</td>";

					echo "</tr>";
				}
			?>
			</tbody>	
		</table>
	</div>

</body>
</html>