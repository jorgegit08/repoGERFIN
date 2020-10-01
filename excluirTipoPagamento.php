<?php
require 'TipoPagamento.class.php';
require 'conexaoDB.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="assets/css/style.css" rel="stylesheet">
	<title>Menu</title>
</head>

<body>
	
	<?php require 'menu.php';?>
		
	<h1 class="tit">Excluir Tipo de pagamento</h1> 
	<?php
		$tp=new TipoPagamento;
		$tp->consultarTipoPagamento($_GET['idTipoPagamento']);
	?>
		
	<div class="cadastro">
		
		<form method="post" action="excluirTipoPagamentoSalvar.php"> 
			<p> 
				<label for="txtDescricao">Descrição do tipo de pagamento:</label><br>
				<input id="txtDescricao" name="txtDescricao" disabled="disabled" value="<?=$tp->txtDescricao?>" type="text" placeholder="Descrição" />
				<input type="hidden" name="idTipoPagamento" value="<?=$_GET['idTipoPagamento']?>">
			</p>
			

			<p> 
			  <input  type="submit" value="Excluir"/> 
			</p>
	</div>
	
</body>
</html>