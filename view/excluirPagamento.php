<?php
require '../model/Pagamento.class.php';
require '../assets/util/conexaoDB.php';
require '../model/TipoPagamento.class.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="../css/style.css" rel="stylesheet">
	<link href="../css/styleEdicao.css" rel="stylesheet">
	<title>Gerfin</title>
</head>

<body>
	
	<?php require 'menu.php';?>
		
	<h1 class="tit">Excluir Pagamento</h1> 
	<?php
		$pg=new Pagamento;
		$pg->consultarPagamento($_GET['idPagamento']);
	?>
	
	<form method="post" action="../controller/excluirPagamentoSalvar.php"> 	
		
		<div class="divPrincipalEdicao">
			<h2 class="h2Edicao">Dados do pagamento</h2> 
			
			<div> 
				<label for="txtDescricao">Descrição do pagamento:</label><br>
				<input id="txtDescricao" name="txtDescricao" disabled="disabled" value="<?=$pg->txtDescricao?>" type="text" placeholder="Descrição" />
			</div>
			
			<div> 
			<label for="desctppagamento">Tipo do pagamento:</label><br>
				<input id="desctppagamento" name="desctppagamento" disabled="disabled" value="<?=$pg->txtDescricao?>" type="text" placeholder="Descrição" />
			</div>

			<div> 
				<label for="datVencimento">Data vencimento:</label><br>
				<input id="datVencimento" name="datVencimento" disabled="disabled" type="date" value="<?=$pg->datVencimento?>" placeholder="01/01/2020"/> 
			</div>

			<div> 
				<label for="datPagamento">Data de pagamento:</label><br>
				<input id="datPagamento" name="datPagamento" disabled="disabled" type="date" value="<?=$pg->datPagamento?>" placeholder="01/01/2020"/> 
			</div>

			<div> 
				<label for="vlrValor">Valor:</label><br>
				<input id="vlrValor" name="vlrValor" disabled="disabled" value="<?=$pg->vlrValor?>" type="text" placeholder="100"/>
			</div>
			
			<div> 
				<input id="idPagamento" name="idPagamento" type="hidden" value="<?=$_GET['idPagamento']?>"/>
			</div>

			<div class="margemCima30"> 
				<input type="submit" id="btnExcluir" class="botaoCadastro" value="Excluir"/> 
			</div>
		</div>
	</form>
	
</body>
</html>