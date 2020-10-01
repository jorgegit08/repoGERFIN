<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="assets/css/style.css" rel="stylesheet">
	<title>Menu</title>
</head>

<body>
	
	<?php require 'menu.php';?>
	
	<h1 class="tit">Cadastrar Tipo de pagamento</h1> 
	
	<div class="cadastro">
	
		<form method="post" action="cadastrarTipoPagamentoSalvar.php"> 
			
			<p> 
				<label for="txtDescricao">Descrição do tipo de Pagamento:</label><br>
				<input id="txtDescricao" name="txtDescricao" required="required" type="text" placeholder="Descrição" />
			</p>
			  
			<p> 
				<input  type="submit" value="Cadastrar"/> 
			</p>
		</form>
	</div>
	
</body>
</html>