<?php
require 'Pagamento.class.php';
require 'conexaoDB.php';
require 'TipoPagamento.class.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="assets/css/style.css" rel="stylesheet">
	<title>Menu</title>
</head>

<body>
	
	<?php require 'menu.php';?>
		
	<h1 class="tit">Excluir Pagamento</h1> 
	<?php
		$pg=new Pagamento;
		$pg->consultarPagamento($_GET['idPagamento']);
	?>
		
	<div class="cadastro">
	
		
		<form method="post" action="excluirPagamentoSalvar.php"> 
			<p> 
				<label for="txtDescricao">Descrição:</label><br>
				<input id="txtDescricao" name="txtDescricao" disabled="disabled" value="<?=$pg->txtDescricao?>" type="text" placeholder="Descrição" />
			</p>
			<p> 
			<label for="desctppagamento">Descrição:</label><br>
				<input id="desctppagamento" name="desctppagamento" disabled="disabled" value="<?=$pg->txtDescricao?>" type="text" placeholder="Descrição" />
			</p>
			<p> 
				<label for="datVencimento">Data Vencimento:</label><br>
				<input id="datVencimento" name="datVencimento" disabled="disabled" type="date" value="<?=$pg->datVencimento?>" placeholder="01/01/2020"/> 
			</p>
			<p> 
				<label for="datPagamento">Data de pagamento:</label><br>
				<input id="datPagamento" name="datPagamento" disabled="disabled" type="date" value="<?=$pg->datPagamento?>" placeholder="01/01/2020"/> 
			</p>
			<p> 
				<label for="vlrValor">Valor:</label><br>
				<input id="vlrValor" name="vlrValor" disabled="disabled" value="<?=$pg->vlrValor?>" type="text" placeholder="100"/>
			</p>
			
			<p> 
				<input id="idPagamento" name="idPagamento" type="hidden" value="<?=$_GET['idPagamento']?>"/>
			</p>

			<p> 
			  <input  type="submit" value="Excluir"/> 
			</p>
	</div>
	
</body>
</html>