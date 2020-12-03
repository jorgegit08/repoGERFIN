<?php

require '../assets/util/conexaoDB.php';
require '../model/Usuario.class.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
		<link href="../css/style.css" rel="stylesheet">
		<link href="../css/styleEdicao.css" rel="stylesheet">
		<script src='/TCC/assets/jquery/sweetalert2/sweetalert2.js'></script>
        <title>Gerfin</title>
</head>
<body>

    <script>
        function excluirConta(){
            
			swal.fire({
				title: 'Tem certeza que deseja excluir essa conta?',
				text:  'Digite sua senha para confirmar.',
				icon: 'question',
				input: 'password',
				inputAttributes: {
					autocapitalize: 'off'
				},
				showCancelButton: true,
				confirmButtonText: 'Confirmar',
				cancelButtonText: 'Cancelar',
				showLoaderOnConfirm: true
				
			}).then((result) => {
			
				if (result.isConfirmed) {
					window.location.href='../controller/excluirUsuario.php?txtSenha='+result.value;
				
				}else if(result.isDismissed){
					
					swal.fire({
						title: 'Cancelado',
						text:  'Cancelado pelo usuário.',
						icon: 'warning'
					})
				}
			})

        }

	</script>
	
	<script type="text/javascript" src="/TCC/assets/jquery/jQuery-3.3.1/jquery-3.3.1.js"></script>

	<h1 class="tit">Meus Dados</h1>
	<?php 
		require 'menu.php';		
		require '../assets/jquery/jQuery-Mask-Plugin-master/jQueryMascara.php';

		$u= new Usuario;
		$u->consultarUsuario();
	?>
	
	<form method="post" action="../controller/alterarUsuarioSalvar.php">
		<div class="divPrincipalEdicao">
			<h2 class="h2Edicao">Dados do usuário</h2>
			
			<div>
				<label for="txtNome">Nome:</label><br>
				<input id="txtNome" name="txtNome" required="required" type="text" value="<?=$u->txtNome?>"/>
			</div>

			<div>
				<label for="txtCPF">CPF:</label><br>
				<input id="txtCPF" name="txtCPF" required="required" class="mascaraCPF"  type="text" value="<?=$u->txtCPF?>"/>
			</div>

			<div>
				<label for="txtEmail">E-mail:</label><br>
				<input id="txtEmail" name="txtEmail" required="required" type="text" class="mascaraEmailAsj" style="width: 223px" value="<?=str_replace("@asj.adv.br","",$u->txtEmail)?>"/>@asj.adv.br
			</div>

			<div>
				<label for="datNascimento">Data de nascimento:</label><br>
				<input id="datNascimento" name="datNascimento" required="required" type="date" value="<?=$u->datNascimento?>"/>
			</div>
			
			<div>
				<label for="txtTelefone">Telefone:</label><br>
				<input id="txtTelefone" name="txtTelefone" required="required" class="mascaraDDDTelefone" type="text" value="<?=$u->txtTelefone?>" />
			</div>
			
			<div>
				<label for="txtSenha">Nova Senha:</label><br>
				<input id="txtSenha" name="txtSenha" required="required" type="password" value="" /><br>
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
