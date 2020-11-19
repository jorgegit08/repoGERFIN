<?php
require 'Favorecido.class.php';
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
		
	<h1 class="tit">Alterar Favorecido</h1> 
	<?php
		$f=new Favorecido;
		$f->consultarFavorecido($_GET['idFavorecido']);
	?>
	
	<form method="post" action="alterarFavorecidoSalvar.php"> 	
		<div class="divPrincipalEdicao">
			<h2 class="h2Edicao">Dados do favorecido</h2> 
	
			<div> 
				<label for="txtNome">Nome:</label><br>
				<input id="txtNome" name="txtNome" required="required" value="<?=$f->txtNome?>" type="text" placeholder="nome" />
			</div>

			<div> 
				<label for="txtCPF">CPF:</label><br>
				<input id="txtCPF" name="txtCPF" value="<?=$f->txtCPF?>" type="text" placeholder="99 999 999 999"/> 
			</div>

			<div> 
				<label for="datNascimento">data Nascimento:</label><br>
				<input id="datNascimento" name="datNascimento" type="date" value="<?=$f->datNascimento?>" placeholder="01/01/1999"/> 
			</div>

			<div> 
				<label for="txtEmail">endereço:</label><br>
				<input id="txtEmail" name="txtEmail" type="email" value="<?=$f->txtEmail?>" placeholder="contato@htmlecsspro.com"/> 
			</div>

			<div> 
				<label for="txtOAB">OAB:</label><br>
				<input id="txtOAB" name="txtOAB" value="<?=$f->txtOAB?>" type="text" placeholder="01/01/2000"/>
			</div>

			<div> 
				<label for="txtEndereco">Endereco:</label><br>
				<input id="txtEndereco" name="txtEndereco" type="text" value="<?=$f->txtEndereco?>" placeholder="99999 9999" />
			</div>

			<div> 
				<label for="txtTelefone">Telefone:</label><br>
				<input id="txtTelefone" name="txtTelefone" type="text" value="<?=$f->txtTelefone?>" placeholder="999999"/>
			</div>

			<div> 
				<input id="idFavorecido" name="idFavorecido" type="hidden" value="<?=$_GET['idFavorecido']?>"/>
			</div>

			<div class="margemCima30"> 
				<input type="submit" class="botaoCadastro" value="Alterar"/> 
			</div>
		</div>
	</form>

</body>
</html>