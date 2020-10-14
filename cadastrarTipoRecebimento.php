<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="assets/css/style.css" rel="stylesheet">
	<title>Menu</title>
</head>

<body>
	
	<?php require 'menu.php';?>
	
	<h1 class="tit">Cadastrar Tipo de Recebimento</h1> 
	
	<div class="cadastro">
	
		<form method="post" action="cadastrarTipoRecebimentoSalvar.php"> 
			
			<p> 
				<label for="txtDescricao">Tipo de recebimento:</label><br>
				<input id="txtDescricao" name="txtDescricao" required="required" type="text" placeholder="Tipo de recebimento" />
			</p>
			  
			<p> 
				<input  type="submit" value="Cadastrar"/> 
			</p>
			
		</form>
	</div>
	
</body>
</html>