<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="css/style.css" rel="stylesheet">
	<link href="css/styleEdicao.css" rel="stylesheet">
	<title>Gerfin</title>
</head>

<body>
	
	<?php require 'menu.php';?>
	
	<h1 class="tit">Cadastrar Tipo de pagamento</h1> 
	
	<form method="post" action="cadastrarTipoPagamentoSalvar.php"> 
		
		<div class="divPrincipalEdicao">
			<h2 class="h2Edicao">Dados do tipo de pagamento</h2> 

			<div> 
				<label for="txtDescricao">Descrição do tipo de Pagamento:</label><br>
				<input id="txtDescricao" name="txtDescricao" required="required" type="text" placeholder="Descrição" />
			</div>
			  
			<div class="margemCima30"> 
				<input type="submit" class="botaoCadastro" value="Cadastrar"/> 
			</div>
		</form>
	</div>
	
</body>
</html>