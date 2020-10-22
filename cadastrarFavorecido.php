<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="assets/css/style.css" rel="stylesheet">
	<title>Menu</title>
</head>

<body>
	
	<?php require 'menu.php';?>
	
	<h1 class="tit">Cadastrar Favorecido</h1> 
	
	<div class="cadastro">
	
		<form method="post" action="cadastrarFavorecidoSalvar.php"> 
			
			<p> 
				<label for="txtNome">Nome:</label><br>
				<input id="txtNome" name="txtNome" required="required" type="text" placeholder="nome" />
			</p>
			<p> 
				<label for="txtCPF">CPF:</label><br>
				<input id="txtCPF" name="txtCPF" required="required" type="text" placeholder="99 999 999 999"/> 
			</p>
			<p> 
				<label for="datNascimento">Data de nascimento:</label><br>
				<input id="datNascimento" name="datNascimento" required="required" type="date" placeholder="01/01/1999"/> 
			</p>
			<p> 
				<label for="txtEmail">E-mail:</label><br>
				<input id="txtEmail" name="txtEmail" required="required" type="email" placeholder="contato@htmlecsspro.com"/> 
			</p>
			 
			<p> 
				<label for="txtOAB">OAB:</label><br>
				<input id="txtOAB" name="txtOAB" required="required" type="text" placeholder="55555"/>
			</p>
			<p> 
				<label for="txtEndereco">Endereco:</label><br>
				<input id="txtEndereco" name="txtEndereco" required="required" type="text" placeholder="rua 21 centro" />
			</p>
			<p> 
				<label for="txtTelefone">Telefone :</label><br>
				<input id="txtTelefone" name="txtTelefone" type="text" placeholder="999999"/>
			 </p>
			  
			<p> 
				<input  type="submit" value="Cadastrar"/> 
			</p>
		</form>
	</div>
	
</body>
</html>