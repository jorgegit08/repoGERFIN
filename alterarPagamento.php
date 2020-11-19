<?php
require 'Pagamento.class.php';
require 'conexaoDB.php';
require 'TipoPagamento.class.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="css/style.css" rel="stylesheet">
	<link href="css/styleEdicao.css" rel="stylesheet">
	<title>Gerfin</title>
</head>

<body>
	<script type="text/javascript" src="/TCC/assets/jquery/jQuery-3.3.1/jquery-3.3.1.js"></script>
	
	<?php 	require 'menu.php';
			require 'assets/jquery/jQuery-Mask-Plugin-master/jQueryMascara.php';
	?>
		
	<h1 class="tit">Alterar Pagamento</h1> 
	<?php
		$pg=new Pagamento;
		$pg->consultarPagamento($_GET['idPagamento']);
	?>
	
	<form method="post" action="alterarPagamentoSalvar.php"> 
		<div class="divPrincipalEdicao">
			<h2 class="h2Edicao">Dados do pagamento</h2> 
		
			<div> 
				<label for="txtDescricao">Descrição do pagamento:</label><br>
				<input id="txtDescricao" name="txtDescricao" required="required" value="<?=$pg->txtDescricao?>" type="text" placeholder="Descrição" />
			</div>
						
			<div>
				<label for="txtDescricao">Tipo do pagamento:</label><br>
				<?php
					
					$tp= new TipoPagamento;

					echo "<select name='idTipoPagamento' class='selInfo'>";
					
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
			</div>

			<div> 
				<label for="datVencimento">Data vencimento:</label><br>
				<input id="datVencimento" name="datVencimento" required="required" type="date" value="<?=$pg->datVencimento?>" placeholder="01/01/2020"/> 
			</div>

			<div> 
				<label for="datPagamento">Data de pagamento:</label><br>
				<input id="datPagamento" name="datPagamento" type="date" value="<?=$pg->datPagamento?>" placeholder="01/01/2020"/> 
			</div>

			<div> 
				<label for="vlrValor">Valor:</label><br>
				<input id="vlrValor" name="vlrValor" required="required" value="<?=$pg->vlrValor?>" class="mascaraValor2" type="text" placeholder="100"/>
			</div>
			
			<div> 
				<input id="idPagamento" name="idPagamento" type="hidden" value="<?=$_GET['idPagamento']?>"/>
			</div>

			<div class="margemCima30"> 
				<input type="submit" class="botaoCadastro" value="Alterar"/> 
			</div>
		</div>
	</form>
</body>
</html>