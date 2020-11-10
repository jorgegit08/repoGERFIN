<?php
require 'TipoPagamento.class.php';
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
		
	<h1 class="tit">Alterar Tipo de pagamento</h1> 
	<?php
		$tp=new TipoPagamento;
		$tp->consultarTipoPagamento($_GET['idTipoPagamento']);
	?>
		
	<div class="cadastro">
		
		<form method="post" action="alterarTipoPagamentoSalvar.php"> 
			<p> 
				<label for="txtDescricao">Descrição do tipo de pagamento:</label><br>
				<input id="txtDescricao" name="txtDescricao" required="required" value="<?=$tp->txtDescricao?>" type="text" placeholder="Descrição" />
				<input type="hidden" name="idTipoPagamento" value="<?=$_GET['idTipoPagamento']?>">
			</p>
			

			<p> 
			  <input  type="submit" value="Alterar"/> 
			</p>
	</div>
	
</body>
</html>