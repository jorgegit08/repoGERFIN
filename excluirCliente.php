<?php
require 'Cliente.class.php';
require 'conexaoDB.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="css/style.css" rel="stylesheet">
	<link href="css/styleEdicao.css" rel="stylesheet">
	<title>Gerfin</title>
</head>

<body>
	
	<?php require 'menu.php';?>
		
	<h1 class="tit">Excluir Cliente</h1> 
	<?php
		$c=new Cliente;
		$c->consultarCliente($_GET['idCliente']);
	?>

	<form method="post" action="excluirClienteSalvar.php"> 	

		<div class="divPrincipalEdicao">
			<h2 class="h2Edicao">Dados do cliente</h2> 

			<div> 
				<label for="txtRazaoSocial">Nome:</label><br>
				<input id="txtRazaoSocial" name="txtRazaoSocial" required="required" disabled="disabled" value="<?=$c->txtRazaoSocial?>" type="text" placeholder="nome" />
			</div>

			<div> 
				<label for="txtCNPJ">CPF/CNPJ:</label><br>
				<input id="txtCNPJ" name="txtCNPJ" required="required" disabled="disabled" value="<?=$c->txtCNPJ?>" type="text" placeholder="99 999 999 999"/> 
			</div>

			<div> 
				<label for="txtEmail">e-mail:</label><br>
				<input id="txtEmail" name="txtEmail" required="required" disabled="disabled" type="email" value="<?=$c->txtEmail?>" placeholder="contato@htmlecsspro.com"/> 
			</div>

			<div> 
				<label for="txtEndereco">endereço:</label><br>
				<input id="txtEndereco" name="txtEndereco" required="required" disabled="disabled" type="text" value="<?=$c->txtEndereco?>" placeholder="contato@htmlecsspro.com"/> 
			</div>

			<div> 
				<label for="txtContatoDireto">Contato direto:</label><br>
				<input id="txtContatoDireto" name="txtContatoDireto" required="required" disabled="disabled" value="<?=$c->txtContatoDireto?>" type="text" placeholder="01/01/2000"/>
			</div>

			<div> 
				<label for="txtTelefone">Telefone:</label><br>
				<input id="txtTelefone" name="txtTelefone" required="required" disabled="disabled" type="text" value="<?=$c->txtTelefone?>" placeholder="99999 9999" />
			</div>

			<div> 
				<label for="txtInscricaoEstadual">Inscrição estadual:</label><br>
				<input id="txtInscricaoEstadual" name="txtInscricaoEstadual" required="required" disabled="disabled" type="text" value="<?=$c->txtInscricaoEstadual?>" placeholder="999999"/>
			</div>
			
			<div> 
				<input id="idCliente" name="idCliente" type="hidden" value="<?=$_GET['idCliente']?>"/>
			</div>

			<div class="margemCima30"> 
			  <input class="botaoCadastro" id="btnExcluir" type="submit" value="Excluir"/> 
			</div>
		</div>
	</form>
</body>
</html>