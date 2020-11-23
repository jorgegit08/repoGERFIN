<?php
require 'Cliente.class.php';
require 'conexaoDB.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="css/style.css" rel="stylesheet">
	<link href="css/styleEdicao.css" rel="stylesheet">
	<script type="text/javascript" src="/TCC/assets/jquery/jQuery-3.3.1/jquery-3.3.1.js"></script>
	
	<title>Gerfin</title>
</head>

<body>
	<?php require 'menu.php';
		  require 'assets/jquery/jQuery-Mask-Plugin-master/jQueryMascara.php';
	?>
		
	<h1 class="tit">Alterar Cliente</h1> 
	<?php
		$c=new Cliente;
		$c->consultarCliente($_GET['idCliente']);
	?>

	<form method="post" action="alterarClienteSalvar.php">	
		
		<div class="divPrincipalEdicao">

			<h2 class="h2Edicao">Dados do cliente</h2> 
			<div> 
				<label for="txtRazaoSocial">Nome:</label><br>
				<input id="txtRazaoSocial" name="txtRazaoSocial" required="required" value="<?=$c->txtRazaoSocial?>" type="text" placeholder="Razão Social" />
			</div>
			<div> 
				<label for="txtCNPJ">CPF/CNPJ:</label><br>
				<input id="txtCNPJ" name="txtCNPJ" class="mascaraCNPJ" required="required" value="<?=$c->txtCNPJ?>" type="text"/> 
			</div>
			<div> 
				<label for="txtEmail">E-mail:</label><br>
				<input id="txtEmail" name="txtEmail" required="required" type="email" value="<?=$c->txtEmail?>" placeholder="contato@htmlecsspro.com"/> 
			</div>
			<div> 
				<label for="txtEndereco">endereço:</label><br>
				<input id="txtEndereco" name="txtEndereco" required="required" type="text" value="<?=$c->txtEndereco?>" placeholder="contato@htmlecsspro.com"/> 
			</div>
			<div> 
				<label for="txtContatoDireto">Contato direto:</label><br>
				<input id="txtContatoDireto" name="txtContatoDireto" required="required" value="<?=$c->txtContatoDireto?>" type="text" placeholder="01/01/2000"/>
			</div>
			<div> 
				<label for="txtTelefone">Telefone:</label><br>
				<input id="txtTelefone" name="txtTelefone" class="mascaraDDDTelefone" required="required" type="text" value="<?=$c->txtTelefone?>" />
			</div>
			<div> 
				<label for="txtInscricaoEstadual">Inscrição estadual:</label><br>
				<input id="txtInscricaoEstadual" name="txtInscricaoEstadual" required="required" type="text" value="<?=$c->txtInscricaoEstadual?>" placeholder="999999"/>
			</div>
			<div> 
				<input id="idCliente" name="idCliente" type="hidden" value="<?=$_GET['idCliente']?>"/>
			</div>

			<div class="margemCima30"> 
				<input class="botaoCadastro" type="submit" value="Alterar"/> 
			</div>
		</div>
	</form>
</body>
</html>