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
		
	<h1 class="tit">Alterar Pagamento</h1> 
	<?php
		$pg=new Pagamento;
		$pg->consultarPagamento($_GET['idPagamento']);
	?>
		
	<div class="cadastro">
	
		
		<form method="post" action="alterarPagamentoSalvar.php"> 
			<p> 
				<label for="txtDescricao">Descrição:</label><br>
				<input id="txtDescricao" name="txtDescricao" required="required" value="<?=$pg->txtDescricao?>" type="text" placeholder="Descrição" />
			</p>
			<p> 
			<label for="txtDescricao">Descrição:</label><br>
			<?php
				
				$tp= new TipoPagamento;

				echo "<select name='idTipoPagamento'>";
				
				foreach($tp->listarTiposPagamento() as $registroAtual){
					
					if($registroAtual['idTipoPagamento']==$_GET['idTipoPagamento']){
						$selected = "selected";
					}else{
						$selected ="";
					}
					
					echo "<option value=".$registroAtual['idTipoPagamento']. " ".$selected.">".$registroAtual['txtDescricao']."</option>";
					
				}
				echo "</select>";
				?>
				<br>
			</p>
			<p> 
				<br>
				<label for="datVencimento">Data Vencimento:</label><br>
				<input id="datVencimento" name="datVencimento" required="required" type="date" value="<?=$pg->datVencimento?>" placeholder="01/01/2020"/> 
			</p>
			<p> 
				<label for="datPagamento">Data de pagamento:</label><br>
				<input id="datPagamento" name="datPagamento" required="required" type="date" value="<?=$pg->datPagamento?>" placeholder="01/01/2020"/> 
			</p>
			<p> 
				<label for="vlrValor">Valor:</label><br>
				<input id="vlrValor" name="vlrValor" required="required" value="<?=$pg->vlrValor?>" type="text" placeholder="100"/>
			</p>
			
			<p> 
				<input id="idPagamento" name="idPagamento" type="hidden" value="<?=$_GET['idPagamento']?>"/>
			</p>

			<p> 
			  <input  type="submit" value="Alterar"/> 
			</p>
	</div>
	
</body>
</html>