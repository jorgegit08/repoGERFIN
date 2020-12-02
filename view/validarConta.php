<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="../css/style.css" rel="stylesheet">
	<link href="../css/styleEdicao.css" rel="stylesheet">
	<title>Gerfin</title>
</head>

<body>
	<h1 class="tit">Valide sua conta</h1>
	
	<script type="text/javascript" src="../assets/jquery/jQuery-3.3.1/jquery-3.3.1.js"></script>
		
	<?php require '../assets/jquery/jQuery-Mask-Plugin-master/jQueryMascara.php';	?>
	
	<form method="post" action="../controller/validarContaSalvar.php">

		<div class="divPrincipalEdicao" style="margin: 0 auto; width: 600px;">

			<h2 class="h2Edicao" style=" width: 600px">Valide sua conta com o código enviado por e-mail</h2> 

			<div>
				<label for="txtEmail" style="margin-left: 150px">E-mail:</label><br>
				<input id="txtEmail" style="margin-left: 150px; text-align: center" name="txtEmail" disabled="disable" type="text" value="<?=$_GET['txtEmail']?>"/>
			</div>

			<div>
				<label for="codValidacao" style="margin-left: 210px">Código de Validação:</label><br>
				<input id="codValidacao" name="codValidacao" required="required" type="text" class="mascaraCodigoValidacao" style="text-align: center; margin-left: 150px" placeholder="123456"/>
			</div>

			<div class="margemCima30"> 
				<input type="submit" class="botaoCadastro" value="Validar"/> 
			</div>
		
		</div>
	</form>
</body>
</html>
