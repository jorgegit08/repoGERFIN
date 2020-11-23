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

		<div class="divPrincipalEdicao" style="margin: 0 auto">
			<h2 class="h2Edicao">Novo acesso</h2> 

			<div>
				<label for="txtNome">Nome:</label><br>
				<input id="txtNome" name="txtNome" required="required" type="text" placeholder="Nome" />
			</div>
			
			<div>
				<label for="txtCPF">CPF/CNPJ:</label><br>
				<input id="txtCPF" name="txtCPF" required="required" class="mascaraCPF" type="text" placeholder="000.000.000-00"/>
			</div>

			<div>
				<label for="txtEmail">E-mail:</label><br>
				<input id="txtEmail" name="txtEmail" required="required" type="email" placeholder="email@asj.adv.br"/>
			</div>

			<div>
				<label for="datNascimento">Data de nascimento:</label><br>
				<input id="datNascimento" name="datNascimento" required="required" type="date" placeholder="01/01/2000"/>
			</div>
			
			<div>
				<label for="txtTelefone">Telefone:</label><br>
				<input id="txtTelefone" name="txtTelefone" required="required" type="text" class="mascaraDDDTelefone" placeholder="(DD) 0000-00000" />
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
				<label for="indAceitaLGPD">Li e aceitos os <a href="http://www.planalto.gov.br/ccivil_03/_ato2019-2022/2019/lei/l13853.htm#:~:text=LEI%20N%C2%BA%2013.853%2C%20DE%208%20DE%20JULHO%20DE%202019&text=Altera%20a%20Lei%20n%C2%BA%2013.709,Art." target="_blank">termos</a> da LGPD:</label>
				<input id="indAceitaLGPD" name="indAceitaLGPD" required="required" type="checkbox"/>
			</div>

			<div class="margemCima30"> 
				<input type="submit" class="botaoCadastro" value="Cadastrar"/> 
			</div>
		
		</div>
	</form>
</body>
</html>
