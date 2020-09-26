<?php

require 'conexaoDB.php';
require 'Usuario.class.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
        <link href="css/style.css" rel="stylesheet">
        <title>Menu</title>
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


<h1 class="tit">Cadastro</h1>
<nav class="menu" id="principal">
		<ul>
			<h1 align="center">GERFIN</h1>
			<li><a href="">Início</a></li>
			<li><a href="alterarUsuario.php">meus dados</a></li>
			<li><a href="#cliente">Cliente<span>+</span></a></i></li>
			<li><a href="#Contasapagar">Contas a pagar<span>+</span></a></li>
			<li><a href="#ContasaReceber">Contas a Receber<span>+</span></a></li>
			<li><a href="#Relatorios">Relatórios<span>+</span></a></li>
			<li><a href="#Agenda">Agenda <span>+</span></a></li>
		</ul>
	</nav>
		
	
	
	<nav class="menu" id="cliente">
		<ul>
			<li><a href="" class="voltar">Voltar</a></li>
			<li><a href="">Novo</a></li>
			<li><a href="">Consulta</a></li>
        </ul>
    </nav>

	<nav class="menu" id="Contasapagar">
		<ul>
			<li><a href="" class="voltar">Voltar</a></li>
			<li><a href="">Boletos</a></li>
			<li><a href="">Prolabore</a></li>
			<li><a href="">Salário</a></li>
			<li><a href="">Bolsas</a></li>
			<li><a href="">Distribuição de Lucros</a></li>
		</ul>
	</nav>


	<nav class="menu" id="ContasaReceber">
		<ul>
			<li><a href="" class="voltar">Voltar</a></li>
			<li><a href="">Honorários De Prolabore</a></li>
			<li><a href="">Honorários de Êxito</a></li>
		</ul>
	
	</nav>

	<nav class="menu" id="Relatorios">
		<ul>
			<li><a href="" class="voltar">Voltar</a></li>
			<li><a href="">Gastos Mensais</a></li>
			<li><a href="">Distribuições de Lucro</a></li>
			<li><a href="">Notas Fiscais</a></li>
		</ul>
	</nav>

	<nav class="menu" id="Agenda">
		<ul>
			<li><a href="" class="voltar">Voltar</a></li>
			<li><a href="">Marcadores Mensais</a></li>
		</ul>
	</nav>
<div class="cadastro">

        <?php

            $u= new Usuario;
            $u->consultarUsuario();

        ?>


        <form method="post" action="alterarUsuarioSalvar.php">

                <p>
                  <label for="txtNome">Nome:</label><br>
                  <input id="txtNome" name="txtNome" required="required" type="text"  value="<?=$u->txtNome?>"/>
                </p>
                <p>
                        <label for="txtCPF">CPF/CNPJ:</label><br>
                        <input id="txtCPF" name="txtCPF" required="required" type="text"  value="<?=$u->txtCPF?>"/>
                  </p>

                <p>
                  <label for="txtEmail">e-mail:</label><br>
                  <input id="txtEmail" name="txtEmail" required="required" type="email" value="<?=$u->txtEmail?>"/>
                </p>

                <p>
                  <label for="datNascimento">Data de nascimento:</label><br>
                  <input id="datNascimento" name="datNascimento" required="required" type="date" value="<?=$u->datNascimento?>"/>
                </p>
                <p>
                        <label for="txtTelefone">Telefone:</label><br>
                        <input id="txtTelefone" name="txtTelefone" required="required" type="text" value="<?=$u->txtTelefone?>" />
                </p>
                  <p>
                        <label for="txtSenha">Senha:</label><br>
                        <input id="txtSenha" name="txtSenha" required="required" type="password" value="<?=$u->txtSenha?>" /><br>
                        
                </p>
                <p>
                  <input  type="submit" value="Alterar"/>
                  <input  type="button" value="Excluir" onclick="excluirConta()" />
                </p>
</div>
</body>
</html>
