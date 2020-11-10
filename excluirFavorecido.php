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
		
	<h1 class="tit">Excluir Favorecido</h1> 
	<?php
		$f=new Favorecido;
		$f->consultarFavorecido($_GET['idFavorecido']);
	?>
		
	<div class="cadastro">
		
		<form method="post" action="excluirFavorecidoSalvar.php"> 
			<p> 
				<label for="txtNome">Nome:</label><br>
				<input id="txtNome" name="txtNome" required="required" disabled="disabled" value="<?=$f->txtNome?>" type="text" placeholder="nome" />
			</p>
			<p> 
				<label for="txtCPF">CPF:</label><br>
				<input id="txtCPF" name="txtCPF" required="required" disabled="disabled" value="<?=$f->txtCPF?>" type="text" placeholder="99 999 999 999"/> 
			</p>
			<p> 
				<label for="datNascimento">data Nascimento:</label><br>
				<input id="datNascimento" name="datNascimento" required="required" disabled="disabled" type="email" value="<?=$f->txtEmail?>" placeholder="1/01/1999"/> 
			</p>
			<p> 
				<label for="txtEmail">Email:</label><br>
				<input id="txtEmail" name="txtEmail" required="required" disabled="disabled" type="text" value="<?=$f->txtEndereco?>" placeholder="contato@htmlecsspro.com"/> 
			</p>
			<p> 
				<label for="txtOAB">OAB :</label><br>
				<input id="txtOAB" name="txtOAB" required="required" disabled="disabled" value="<?=$f->txtOAB?>" type="text" placeholder="55555"/>
			</p>
			<p> 
				<label for="txtEndereco">Endereco:</label><br>
				<input id="txtEndereco" name="txtEndereco" required="required" disabled="disabled" type="text" value="<?=$f->txtTelefone?>" placeholder="99999 9999" />
			</p>
			<p> 
				<label for="txtTelefone"> Telefone:</label><br>
				<input id="txtTelefone" name="txtTelefone" required="required" disabled="disabled" type="text" value="<?=$f->txtTelefone?>" placeholder="999999"/>
			</p>
			<p> 
				<input id="idFavorecido" name="idFavorecido" type="hidden" value="<?=$_GET['idFavorecido']?>"/>
			</p>

			<p> 
			  <input  type="submit" value="Excluir"/> 
			</p>
	</div>
	
</body>
</html>