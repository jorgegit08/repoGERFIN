<?php
require 'conexaoDB.php';
require 'Cliente.class.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="css/style.css" rel="stylesheet">
	<title>Menu</title>
</head>

<body>
	<script language="javascript">
		function alterarCliente(idCliente){
			window.location.href='alterarCliente.php?idCliente='+idCliente;
		}

		function excluirCliente(idCliente){
			window.location.href='excluirCliente.php?idCliente='+idCliente;
		}



	</script>	


	<nav class="menu" id="cliente">
		<ul>
			<h1 align="center">GERFIN</h1>
			<li><a href="" class="voltar">Voltar</a></li>
			<li><a href="">Novo</a></li>
			<li><a href="">Consulta</a></li>
		</ul>
		</nav>

		<h1 class="tit">Clientes</h1>
		<div class="container">
			<input type="text" placeholder="Pesquisar">
			<a href=""><img src="assets/imagens/busca.png" ></a>
			
		</div>
	<?php
	$c= new Cliente;

	?>
	<div class="pesq">
			
		<table>
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
			<?php
			//$txtCnpj,$txtContatoDireto,$txtEmail,$txtEndereco,$txtInscricaoEstadual,$txtRazaoSocial,$txtTelefone
			
				foreach($c->listarClientes() as $registroAtual){
					echo "<tr>";

					echo "<td>".$registroAtual['txtRazaoSocial']."</td>";
					echo "<td>".$registroAtual['txtCnpj']."</td>";
					echo "<td>".$registroAtual['txtInscricaoEstadual']."</td>";
					echo "<td>".$registroAtual['txtEndereco']."</td>";
					echo "<td>".$registroAtual['txtTelefone']."</td>";
					echo "<td>".$registroAtual['txtContatoDireto']."</td>";
					echo "<td>".$registroAtual['txtEmail']."</td>";
					echo "<td>".
					
						"<input type='button' class='acoes' value='A' onclick='alterarCliente(".$registroAtual['idCliente'].")'>".
						"<input type='button' class='acoes' value='E' onclick='excluirCliente(".$registroAtual['idCliente'].")'>".
					
					"</td>";

					echo "</tr>";
				}

			

			?>
				
			</table>
				
		</div>

		<div class="consulta">
			<ul>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
	
</body>
</html>