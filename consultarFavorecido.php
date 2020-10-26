<?php
require 'conexaoDB.php';
require 'Favorecido.class.php';
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
	
	<div style="display: flex; margin-left: 270px;">
		<img src="/TCC/assets/Icons/adicionar.png" title="Cadastrar Favorecido" style="cursor: hand; width: 40px; height: 40px;" onclick="cadastrarFavorecido()"> Cadastrar Favorecido
	</div>
	
	<div class="pesq" style="background-color: #fff; width: 100%">
		
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
						
						"<img src='/TCC/assets/Icons/editar.png' title='Alterar Favorecido' style='cursor: hand; width: 25px; height: 25px;' onclick='alterarFavorecido(".$registroAtual['idFavorecido'].")'>".
						"<img src='/TCC/assets/Icons/excluir.png' title='Excluir Favorecido' style='cursor: hand; width: 25px; height: 25px;' onclick='excluirFavorecido(".$registroAtual['idFavorecido'].")'>".
					
					"</td>";

					echo "</tr>";
				}
			?>
			</tbody>	
		</table>
	</div>

</body>
</html>