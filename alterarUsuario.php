<?php

require 'config.php';
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
            
            senha = prompt('Digite sua senha para confimar a exclusão da conta','');
            if(senha != null  && senha !=""){
                window.location.href='excluirUsuario.php?senha='+senha;
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
                  <label for="nome">Nome:</label><br>
                  <input id="nome" name="nome" required="required" type="text"  value="<?=$u->nome?>"/>
                </p>
                <p>
                        <label for="cpf">CPF/CNPJ:</label><br>
                        <input id="cpf" name="cpf" required="required" type="text"  value="<?=$u->cpf?>"/>
                  </p>

                <p>
                  <label for="email">e-mail:</label><br>
                  <input id="email" name="email" required="required" type="email" value="<?=$u->email?>"/>
                </p>

                <p>
                  <label for="nascimento">Data de nascimento:</label><br>
                  <input id="nascimento" name="nascimento" required="required" type="date" value="<?=$u->nascimento?>"/>
                </p>
                <p>
                        <label for="telefone">Telefone:</label><br>
                        <input id="telefone" name="telefone" required="required" type="text" value="<?=$u->telefone?>" />
                </p>
                  <p>
                        <label for="senha">Senha:</label><br>
                        <input id="senha" name="senha" required="required" type="password" value="<?=$u->senha?>" /><br>
                        
                </p>
                <p>
                  <input  type="submit" value="Alterar"/>
                  <input  type="button" value="Excluir" onclick="excluirConta()" />
                </p>
</div>
</body>
</html>
