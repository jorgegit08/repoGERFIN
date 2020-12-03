<?php
require '../model/Favorecido.class.php';
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
	<script type="text/javascript" src="/TCC/assets/jquery/jQuery-3.3.1/jquery-3.3.1.js"></script>

	<?php require 'menu.php';
		  require '../assets/jquery/jQuery-Mask-Plugin-master/jQueryMascara.php';
	?>
		
	<h1 class="tit">Alterar Favorecido</h1> 
	<?php
		$f=new Favorecido;
		$f->consultarFavorecido($_GET['idFavorecido']);
	?>
	
	<form method="post" action="../controller/alterarFavorecidoSalvar.php"> 	
		<div class="divPrincipalEdicao">
			<h2 class="h2Edicao">Dados do favorecido</h2> 
	
			<div> 
				<label for="txtNome">Nome:</label><br>
				<input id="txtNome" name="txtNome" required="required" value="<?=utf8_encode($f->txtNome)?>" type="text" placeholder="nome" />
			</div>

			<div> 
				<label for="txtCPFCNPJ">CPF/CNPJ:</label><br>
				<input id="txtCPFCNPJ" name="txtCPFCNPJ" value="<?=$f->txtCPFCNPJ?>" type="text" placeholder="99 999 999 999"/> 
			</div>

			<div> 
				<label for="datNascimento">data Nascimento:</label><br>
				<input id="datNascimento" name="datNascimento" type="date" value="<?=$f->datNascimento?>" placeholder="01/01/1999"/> 
			</div>

			<div> 
				<label for="txtEmail">endereço:</label><br>
				<input id="txtEmail" name="txtEmail" type="email" value="<?=$f->txtEmail?>" placeholder="contato@htmlecsspro.com"/> 
			</div>

			<div> 
				<label for="txtOAB">OAB:</label><br>
				<input id="txtOAB" name="txtOAB" value="<?=$f->txtOAB?>" type="text" placeholder="01/01/2000"/>
			</div>

			<div> 
				<label for="txtEndereco">Endereco:</label><br>
				<input id="txtEndereco" name="txtEndereco" type="text" value="<?=$f->txtEndereco?>" placeholder="99999 9999" />
			</div>

			<div> 
				<label for="txtTelefone">Telefone:</label><br>
				<input id="txtTelefone" name="txtTelefone" type="text" value="<?=$f->txtTelefone?>" placeholder="999999"/>
			</div>

			<div> 
				<input id="idFavorecido" name="idFavorecido" type="hidden" value="<?=$_GET['idFavorecido']?>"/>
			</div>

			<div class="margemCima30"> 
				<input type="submit" class="botaoCadastro" value="Alterar"/> 
			</div>
		</div>
	</form>

</body>
</html>