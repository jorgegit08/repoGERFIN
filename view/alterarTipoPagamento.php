<?php
require '../model/TipoPagamento.class.php';
require '../assets/util/conexaoDB.php';
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
		
	<h1 class="tit">Alterar Tipo de pagamento</h1> 
	<?php
		$tp=new TipoPagamento;
		$tp->consultarTipoPagamento($_GET['idTipoPagamento']);
	?>
	
	<form method="post" action="../controller/alterarTipoPagamentoSalvar.php"> 
		<div class="divPrincipalEdicao">
			<h2 class="h2Edicao">Dados do tipo de pagamento</h2> 
	
			<div> 
				<label for="txtDescricao">Descrição do tipo de pagamento:</label><br>
				<input id="txtDescricao" name="txtDescricao" required="required" value="<?=utf8_encode($tp->txtDescricao)?>" type="text" placeholder="Descrição" />
				<input type="hidden" name="idTipoPagamento" value="<?=$_GET['idTipoPagamento']?>">
			</div>
			
			<div class="margemCima30"> 
				<input type="submit" class="botaoCadastro" value="Excluir"/> 
			</div>
		</div>
	</form>
</body>
</html>