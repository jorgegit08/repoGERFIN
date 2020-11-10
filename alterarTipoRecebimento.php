<?php
require 'TipoRecebimento.class.php';
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
		
	<h1 class="tit">Alterar Tipo de Recebimento</h1> 
	<?php
		$tr=new TipoRecebimento;
		$tr->consultarTipoRecebimento($_GET['idTipoRecebimento']);
	?>
		
	<div class="cadastro">
		
		<form method="post" action="alterarTipoRecebimentoSalvar.php"> 
			<p> 
				<label for="txtDescricao">Descrição do tipo de Recebimento:</label><br>
				<input id="txtDescricao" name="txtDescricao" required="required" value="<?=$tr->txtDescricao?>" type="text" placeholder="Descrição" />
				<input type="hidden" name="idTipoRecebimento" value="<?=$_GET['idTipoRecebimento']?>">
			</p>
			

			<p> 
			  <input  type="submit" value="Alterar"/> 
			</p>
	</div>
	
</body>
</html>