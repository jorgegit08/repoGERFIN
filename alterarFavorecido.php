<?php
require 'Favorecido.class.php';
require 'conexaoDB.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="css/style.css" rel="stylesheet">
	<title>Gerfin</title>
</head>

<body>
	
	<?php require 'menu.php';?>
		
	<h1 class="tit">Alterar Favorecido</h1> 
	<?php
		$f=new Favorecido;
		$f->consultarFavorecido($_GET['idFavorecido']);
	?>
		
	<div class="cadastro">
	
		<form method="post" action="alterarFavorecidoSalvar.php"> 
			<p> 
				<label for="txtNome">Nome:</label><br>
				<input id="txtNome" name="txtNome" required="required" value="<?=$f->txtNome?>" type="text" placeholder="nome" />
			</p>
			<p> 
				<label for="txtCPF">CPF:</label><br>
				<input id="txtCPF" name="txtCPF" required="required" value="<?=$f->txtCPF?>" type="text" placeholder="99 999 999 999"/> 
			</p>
			<p> 
				<label for="datNascimento">data Nascimento:</label><br>
				<input id="datNascimento" name="datNascimento" required="required" type="date" value="<?=$f->datNascimento?>" placeholder="01/01/1999"/> 
			</p>
			<p> 
				<label for="txtEmail">endereço:</label><br>
				<input id="txtEmail" name="txtEmail" required="required" type="email" value="<?=$f->txtEmail?>" placeholder="contato@htmlecsspro.com"/> 
			</p>
			<p> 
				<label for="txtOAB">OAB:</label><br>
				<input id="txtOAB" name="txtOAB" required="required" value="<?=$f->txtOAB?>" type="text" placeholder="01/01/2000"/>
			</p>
			<p> 
				<label for="txtEndereco">Endereco:</label><br>
				<input id="txtEndereco" name="txtEndereco" required="required" type="text" value="<?=$f->txtEndereco?>" placeholder="99999 9999" />
			</p>
			<p> 
				<label for="txtTelefone">Telefone:</label><br>
				<input id="txtTelefone" name="txtTelefone" required="required" type="text" value="<?=$f->txtTelefone?>" placeholder="999999"/>
			</p>
			<p> 
				<input id="idFavorecido" name="idFavorecido" type="hidden" value="<?=$_GET['idFavorecido']?>"/>
			</p>

			<p> 
			  <input  type="submit" value="Alterar"/> 
			</p>
	</div>
	
</body>
</html>