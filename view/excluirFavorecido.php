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
	
	<?php require 'menu.php';?>
		
	<h1 class="tit">Excluir Favorecido</h1> 
	<?php
		$f=new Favorecido;
		$f->consultarFavorecido($_GET['idFavorecido']);
	?>
		
	<form method="post" action="../controller/excluirFavorecidoSalvar.php"> 
		
		<div class="divPrincipalEdicao">
			<h2 class="h2Edicao">Dados do favorecido</h2> 

			<div> 
				<label for="txtNome">Nome:</label><br>
				<input id="txtNome" name="txtNome" disabled="disabled" value="<?=utf8_encode($f->txtNome)?>" type="text" placeholder="nome" />
			</div>

			<div> 
				<label for="txtCPFCNPJ">CPF/CNPJ:</label><br>
				<input id="txtCPFCNPJ" name="txtCPFCNPJ" disabled="disabled" value="<?=$f->txtCPFCNPJ?>" type="text" placeholder="99 999 999 999"/> 
			</div>

			<div> 
				<label for="datNascimento">data Nascimento:</label><br>
				<input id="datNascimento" name="datNascimento" disabled="disabled" type="email" value="<?=$f->txtEmail?>" placeholder="teste@provedor.com"/> 
			</div>

			<div> 
				<label for="txtEmail">Email:</label><br>
				<input id="txtEmail" name="txtEmail" disabled="disabled" type="text" value="<?=$f->txtEndereco?>" placeholder="contato@htmlecsspro.com"/> 
			</div>

			<div> 
				<label for="txtOAB">OAB :</label><br>
				<input id="txtOAB" name="txtOAB" disabled="disabled" value="<?=$f->txtOAB?>" type="text" placeholder="55555"/>
			</div>

			<div> 
				<label for="txtEndereco">Endereco:</label><br>
				<input id="txtEndereco" name="txtEndereco" disabled="disabled" type="text" value="<?=$f->txtTelefone?>" placeholder="99999 9999" />
			</div>

			<div> 
				<label for="txtTelefone"> Telefone:</label><br>
				<input id="txtTelefone" name="txtTelefone" disabled="disabled" type="text" value="<?=$f->txtTelefone?>" placeholder="999999"/>
			</div>

			<div> 
				<input id="idFavorecido" name="idFavorecido" type="hidden" value="<?=$_GET['idFavorecido']?>"/>
			</div>

			<div class="margemCima30"> 
				<input type="submit" id="btnExcluir" class="botaoCadastro" value="Excluir"/> 
			</div>
		</div>

	</form>

</body>
</html>