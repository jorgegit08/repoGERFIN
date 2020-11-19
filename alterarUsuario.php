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

    <script>
        function excluirConta(){
            
            txtSenha = prompt('Digite sua senha para confimar a exclusão da conta','');
            if(txtSenha != null  && txtSenha !=""){
                window.location.href='excluirUsuario.php?txtSenha='+txtSenha;
            }else{
                alert('Operação cancelada pelo usuário')
            }
        }

	</script>
	
	<h1 class="tit">Meus Dados</h1>
	<?php 
		require 'menu.php';

		$u= new Usuario;
		$u->consultarUsuario();
	?>
	
	<form method="post" action="alterarUsuarioSalvar.php">
		<div class="divPrincipalEdicao">
			<h2 class="h2Edicao">Dados do usuário</h2>
			
			<div>
				<label for="txtNome">Nome:</label><br>
				<input id="txtNome" name="txtNome" required="required" type="text" value="<?=$u->txtNome?>"/>
			</div>

			<div>
				<label for="txtCPF">CPF/CNPJ:</label><br>
				<input id="txtCPF" name="txtCPF" required="required" type="text" value="<?=$u->txtCPF?>"/>
			</div>

			<div>
				<label for="txtEmail">E-mail:</label><br>
				<input id="txtEmail" name="txtEmail" required="required" type="email" value="<?=$u->txtEmail?>"/>
			</div>

			<div>
				<label for="datNascimento">Data de nascimento:</label><br>
				<input id="datNascimento" name="datNascimento" required="required" type="date" value="<?=$u->datNascimento?>"/>
			</div>
			
			<div>
				<label for="txtTelefone">Telefone:</label><br>
				<input id="txtTelefone" name="txtTelefone" required="required" type="text" value="<?=$u->txtTelefone?>" />
			</div>
			
			<div>
				<label for="txtSenha" >Senha:</label><br>
				<input id="txtSenha" name="txtSenha" required="required" type="password" value="<?=$u->txtSenha?>" /><br>
			</div>
			
			<div class="margemCima30 margemBaixo30">
				<input type="submit" class="botaoCadastro" value="Alterar" />
			</div>
			
			<div>
				<input type="button" id="btnExcluir" class="botaoCadastro" value="Excluir" onclick="excluirConta()" />
			</div>
			
		</div>
	</form>

</body>
</html>
