<?php
require 'TipoRecebimento.class.php';
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
		
	<h1 class="tit">Alterar Tipo de Recebimento</h1> 
	<?php
		$tr=new TipoRecebimento;
		$tr->consultarTipoRecebimento($_GET['idTipoRecebimento']);
	?>
		
	<form method="post" action="alterarTipoRecebimentoSalvar.php"> 	
		<div class="pesq pesqFiltro tamanho400 altura100percent borda">
			<h2 class="margemBaixo30 alinhaTextoCentro tamanho400 margemCima10">Dados do tipo de recebimento</h2> 
		
			<div> 
				<label for="txtDescricao">Descrição do tipo de Recebimento:</label><br>
				<input id="txtDescricao" name="txtDescricao" required="required" value="<?=$tr->txtDescricao?>" type="text" placeholder="Descrição" />
				<input type="hidden" name="idTipoRecebimento" value="<?=$_GET['idTipoRecebimento']?>">
			</div>

			<div class="margemCima30"> 
				<input type="submit" class="botaoCadastro" value="Alterar"/> 
			</div>
	</div>
	
</body>
</html>