<?php
require '../model/TipoRecebimento.class.php';
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
		
	<h1 class="tit">Excluir Tipo de Recebimento</h1> 
	<?php
		$tr=new TipoRecebimento;
		$tr->consultarTipoRecebimento($_GET['idTipoRecebimento']);
	?>
		
	<form method="post" action="../controller/excluirTipoRecebimentoSalvar.php"> 
		<div class="divPrincipalEdicao">
			<h2 class="h2Edicao">Dados do tipo de recebimento</h2> 
		
			<p> 
				<label for="txtDescricao">Descrição do tipo de Recebimento:</label><br>
				<input id="txtDescricao" name="txtDescricao" disabled="disabled" value="<?=$tr->txtDescricao?>" type="text" placeholder="Descrição" />
				<input type="hidden" name="idTipoRecebimento" value="<?=$_GET['idTipoRecebimento']?>">
			</p>
			
			<div class="margemCima30"> 
				<input type="submit" id="btnExcluir" class="botaoCadastro" value="Excluir"/> 
			</div>
	</div>
	
</body>
</html>