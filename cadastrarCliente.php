<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="css/style.css" rel="stylesheet">
	<link href="css/styleEdicao.css" rel="stylesheet">
	<title>Gerfin</title>
</head>

<body>
	
	<script type="text/javascript" src="/TCC/assets/jquery/jQuery-3.3.1/jquery-3.3.1.js"></script>
		
	<?php require 'menu.php';
		  require 'assets/jquery/jQuery-Mask-Plugin-master/jQueryMascara.php';
	?>
	
	<h1 class="tit">Cadastrar Cliente</h1> 
	
	<form method="post" action="cadastrarClienteSalvar.php"> 
	
		<div class="pesq pesqFiltro tamanho400 altura100percent borda">
			<h2 class="margemBaixo30 margemCima10 alinhaTextoCentro tamanho400">Dados do cliente</h2> 
			
			<div> 
				<label for="txtRazaoSocial">Nome:</label><br>
				<input id="txtRazaoSocial" name="txtRazaoSocial" required="required" type="text" placeholder="nome" />
			</div>

			<div> 
				<label for="txtCNPJ">CPF/CNPJ:</label><br>
				<input id="txtCNPJ" name="txtCNPJ" required="required" class="mascaraCPF mascaraCNPJ" type="text" placeholder="99 999 999 999"/> 
			</div>

			<div> 
				<label for="txtEmail">E-mail:</label><br>
				<input id="txtEmail" name="txtEmail" required="required" type="email" placeholder="contato@htmlecsspro.com"/> 
			</div>

			<div> 
				<label for="txtEndereco">Endereço:</label><br>
				<input id="txtEndereco" name="txtEndereco" required="required" type="text" placeholder="SHCES Quadra 201"/> 
			</div>
			 
			<div> 
				<label for="txtContatoDireto">Contato direto:</label><br>
				<input id="txtContatoDireto" name="txtContatoDireto" required="required" type="text" placeholder="Joaquin da Silva"/>
			</div>

			<div> 
				<label for="txtTelefone">Telefone:</label><br>
				<input id="txtTelefone" name="txtTelefone" required="required" class="mascaraDDDTelefone" type="text" placeholder="99999 9999" />
			</div>

			<div> 
				<label for="txtInscricaoEstadual">Inscrição estadual:</label><br>
				<input id="txtInscricaoEstadual" name="txtInscricaoEstadual" type="text" placeholder="999999"/>
			</div>
			  
			<div class="margemCima30"> 
			  <input class="botaoCadastro" type="submit" value="Cadastrar"/> 
			</div>

		</div>

	</form>
</body>
</html>