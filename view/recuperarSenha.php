<?php

require '../assets/util/conexaoDB.php';
require '../model/Usuario.class.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="../css/style.css" rel="stylesheet">
	<link href="../css/styleEdicao.css" rel="stylesheet">
	<title>Gerfin</title>
</head>

<body>
	<h1 class="tit">Recuperar Senha</h1>
	
	<script type="text/javascript" src="../assets/jquery/jQuery-3.3.1/jquery-3.3.1.js"></script>
		
	<?php require '../assets/jquery/jQuery-Mask-Plugin-master/jQueryMascara.php';	?>
	
	<form method="post" action="../controller/recuperarSenhaSalvar.php">

		<div class="divPrincipalEdicao" style="margin: 0 auto">
			<h2 class="h2Edicao">Recuperar Senha</h2> 

			<div>
				<label for="txtEmail">E-mail:</label><br>
				<input id="txtEmail" name="txtEmail" required="required" type="text" class="mascaraEmailAsj" style="width: 223px" placeholder="email"/>@asj.adv.br
			</div>

			<div>
				<label for="txtTelefone">Telefone:</label><br>
				<input id="txtTelefone" name="txtTelefone" required="required" type="text" class="mascaraDDDTelefone" placeholder="(DD) 0000-00000" />
			</div>

			<div class="margemCima30"> 
				<input type="submit" class="botaoCadastro" value="Recuperar"/> 
			</div>
		
		</div>
	</form>
</body>
</html>
