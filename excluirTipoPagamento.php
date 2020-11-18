<?php
require 'TipoPagamento.class.php';
require 'conexaoDB.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="css/style.css" rel="stylesheet">
	<link href="css/styleEdicao.css" rel="stylesheet">
	<title>Gerfin</title>
</head>

<body>
	
	<?php require 'menu.php';?>
		
	<h1 class="tit">Excluir Tipo de pagamento</h1> 
	<?php
		$tp=new TipoPagamento;
		$tp->consultarTipoPagamento($_GET['idTipoPagamento']);
	?>
	
	<form method="post" action="excluirTipoPagamentoSalvar.php"> 
		
		<div class="pesq pesqFiltro tamanho400  altura100percent borda">
			<h2 class="margemBaixo30 alinhaTextoCentro tamanho400 margemCima10">Dados do tipo de pagamento</h2> 
		
			<div> 
				<label for="txtDescricao">Descrição do tipo de pagamento:</label><br>
				<input id="txtDescricao" name="txtDescricao" disabled="disabled" value="<?=$tp->txtDescricao?>" type="text" placeholder="Descrição" />
				<input type="hidden" name="idTipoPagamento" value="<?=$_GET['idTipoPagamento']?>">
			</div>
			
			<div class="margemCima30"> 
				<input type="submit" id="btnExcluir" class="botaoCadastro" value="Excluir"/> 
			</div>
		</div>

	</form>
	
</body>
</html>