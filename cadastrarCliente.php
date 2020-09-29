<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="assets/css/style.css" rel="stylesheet">
	<title>Menu</title>
</head>

<body>
	
	<?php require 'menu.php';?>
	
	<h1 class="tit">Cadastrar Cliente</h1> 
	
	<div class="cadastro">
	
		<form method="post" action="cadastrarClienteSalvar.php"> 
			
			<p> 
				<label for="txtRazaoSocial">Nome:</label><br>
				<input id="txtRazaoSocial" name="txtRazaoSocial" required="required" type="text" placeholder="nome" />
			</p>
			<p> 
				<label for="txtCNPJ">CPF/CNPJ:</label><br>
				<input id="txtCNPJ" name="txtCNPJ" required="required" type="text" placeholder="99 999 999 999"/> 
			</p>
			<p> 
				<label for="txtEmail">e-mail:</label><br>
				<input id="txtEmail" name="txtEmail" required="required" type="email" placeholder="contato@htmlecsspro.com"/> 
			</p>
			<p> 
				<label for="txtEndereco">endereço:</label><br>
				<input id="txtEndereco" name="txtEndereco" required="required" type="text" placeholder="contato@htmlecsspro.com"/> 
			</p>
			 
			<p> 
				<label for="txtContatoDireto">Contato direto:</label><br>
				<input id="txtContatoDireto" name="txtContatoDireto" required="required" type="text" placeholder="Joaquin da Silva"/>
			</p>
			<p> 
				<label for="txtTelefone">Telefone:</label><br>
				<input id="txtTelefone" name="txtTelefone" required="required" type="text" placeholder="99999 9999" />
			</p>
			<p> 
				<label for="txtInscricaoEstadual">Inscrição estadual:</label><br>
				<input id="txtInscricaoEstadual" name="txtInscricaoEstadual" type="text" placeholder="999999"/>
			 </p>
			  
			<p> 
				<input  type="submit" value="Cadastrar"/> 
			</p>
		</form>
	</div>
	
</body>
</html>