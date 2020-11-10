<?php
require 'Pagamento.class.php';
require 'conexaoDB.php';
require 'TipoPagamento.class.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="css/style.css" rel="stylesheet">
	<title>Gerfin</title>
</head>

<body>
	
	<?php require 'menu.php';?>
		
	<h1 class="tit">Cadastrar Pagamento</h1> 
		
	<div class="cadastro">
	
		
		<form method="post" action="cadastrarPagamentoSalvar.php"> 
			<p> 
				<label for="txtDescricao">Descrição:</label><br>
				<input id="txtDescricao" name="txtDescricao" required="required"  type="text" placeholder="Descrição" />
			</p>
			<p> 
			<label for="txtDescricao">Descrição:</label><br>
			<?php
				
				$tp= new TipoPagamento;

				echo "<select name='idTipoPagamento'>";
				
				foreach($tp->listarTiposPagamento() as $registroAtual){
					
					
					echo "<option value=".$registroAtual['idTipoPagamento']. " ".$selected.">".$registroAtual['txtDescricao']."</option>";
					
				}
				echo "</select>";
				?>
				<br>
			</p>
			<p> 
				<br>
				<label for="datVencimento">Data Vencimento:</label><br>
				<input id="datVencimento" name="datVencimento" required="required" type="date"  placeholder="01/01/2020"/> 
			</p>
			<p> 
				<label for="datPagamento">Data de pagamento:</label><br>
				<input id="datPagamento" name="datPagamento"  type="date"  placeholder="01/01/2020"/> 
			</p>
			<p> 
				<label for="vlrValor">Valor:</label><br>
				<input id="vlrValor" name="vlrValor" required="required"  type="text" placeholder="100"/>
			</p>

			<p> 
			  <input  type="submit" value="Cadastrar"/> 
			</p>
	</div>
	
</body>
</html>