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
	
	<h1 class="tit">Cadastrar Favorecido</h1> 
	
	<form method="post" action="cadastrarFavorecidoSalvar.php"> 
		<div class="pesq pesqFiltro tamanho400 altura100percent borda">
			<h2 class="margemBaixo30 alinhaTextoCentro tamanho400 margemCima10">Dados favorecido</h2> 
		
			<div> 
				<label for="txtNome">Nome:</label><br>
				<input id="txtNome" name="txtNome" required="required" type="text" placeholder="nome" />
			</div>

			<div> 
				<label for="txtCPF">CPF:</label><br>
				<input id="txtCPF" name="txtCPF" type="text" class="mascaraCPF" placeholder="99 999 999 999"/> 
			</div>

			<div> 
				<label for="datNascimento">Data de nascimento:</label><br>
				<input id="datNascimento" name="datNascimento" type="date" placeholder="01/01/1999"/> 
			</div>

			<div> 
				<label for="txtEmail">E-mail:</label><br>
				<input id="txtEmail" name="txtEmail" type="email" placeholder="contato@htmlecsspro.com"/> 
			</div>
			 
			<div> 
				<label for="txtOAB">OAB:</label><br>
				<input id="txtOAB" name="txtOAB" type="text" placeholder="55555"/>
			</div>

			<div> 
				<label for="txtEndereco">Endereco:</label><br>
				<input id="txtEndereco" name="txtEndereco" type="text" placeholder="rua 21 centro" />
			</div>

			<div> 
				<label for="txtTelefone">Telefone :</label><br>
				<input id="txtTelefone" name="txtTelefone" class="mascaraDDDTelefone" type="text" placeholder="999999"/>
			</div>
			  
			<div class="margemCima30"> 
				<input type="submit" class="botaoCadastro" value="Cadastrar"/> 
			</div>
		</form>
	</div>
	
</body>
</html>