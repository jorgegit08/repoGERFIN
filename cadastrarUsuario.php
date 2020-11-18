<?php

require 'conexaoDB.php';
require 'Usuario.class.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="css/style.css" rel="stylesheet">
	<link href="css/styleEdicao.css" rel="stylesheet">
	<title>Gerfin</title>
</head>

<body>
	<h1 class="tit">Cadastrar Usuário</h1>
	
	<script type="text/javascript" src="/TCC/assets/jquery/jQuery-3.3.1/jquery-3.3.1.js"></script>
		
	<?php require 'assets/jquery/jQuery-Mask-Plugin-master/jQueryMascara.php';	?>
	
	<form method="post" action="cadastrarUsuarioSalvar.php">

		<div class="pesq pesqFiltro tamanho400 altura100percent borda" style="margin: 0 auto">
			<h2 class="margemBaixo30 alinhaTextoCentro tamanho400 margemCima10">Novo acesso</h2> 

			<div>
				<label for="txtNome">Nome:</label><br>
				<input id="txtNome" name="txtNome" required="required" type="text" placeholder="Nome" />
			</div>
			
			<div>
				<label for="txtCPF">CPF/CNPJ:</label><br>
				<input id="txtCPF" name="txtCPF" required="required" class="mascaraCPF mascaraCNPJ" type="text" placeholder="000.000.000-00"/>
			</div>

			<div>
				<label for="txtEmail">E-mail:</label><br>
				<input id="txtEmail" name="txtEmail" required="required" type="email" placeholder="contato@htmlecsspro.com"/>
			</div>

			<div>
				<label for="datNascimento">Data de nascimento:</label><br>
				<input id="datNascimento" name="datNascimento" required="required" type="date" placeholder="01/01/2000"/>
			</div>
			
			<div>
				<label for="txtTelefone">Telefone:</label><br>
				<input id="txtTelefone" name="txtTelefone" required="required" type="text" class="mascaraDDDtelefone" placeholder="(DD) 0000-00000" />
			</div>
			
			<div>
				<label for="txtSenha">Senha:</label><br>
				<input id="txtSenha" name="txtSenha" required="required" type="password" placeholder="senha" /><br>				
			</div>

			<div>
				<label for="txtSenha">Confirme a Senha:</label><br>
				<input id="txtConfirmaSenha" name="txtConfirmaSenha" required="required" type="password" placeholder="Confirmar senha" />
			</div>
			
			<div class="margemCima30"> 
				<input type="submit" class="botaoCadastro" value="Cadastrar"/> 
			</div>
		
		</div>
	</form>
</body>
</html>
