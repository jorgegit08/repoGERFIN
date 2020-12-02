<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="../css/style.css" rel="stylesheet">
	<link href="../css/styleEdicao.css" rel="stylesheet">
	<title>Gerfin</title>
</head>

<body>
	
	<?php require 'menu.php';?>
	
	<h1 class="tit">Cadastrar Tipo de Recebimento</h1> 
	
	<form method="post" action="../controller/cadastrarTipoRecebimentoSalvar.php"> 
		<div class="divPrincipalEdicao">
			<h2 class="h2Edicao">Dados do tipo de recebimento</h2> 

			<div> 
				<label for="txtDescricao">Tipo de recebimento:</label><br>
				<input id="txtDescricao" name="txtDescricao" required="required" type="text" placeholder="Tipo de recebimento" />
			</div>
			  
			<div class="margemCima30"> 
				<input type="submit" class="botaoCadastro" value="Cadastrar"/> 
			</div>
			
		</form>
	</div>
	
</body>
</html>