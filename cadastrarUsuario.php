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
<h1 class="tit">Cadastrar Usuário</h1>
<div class="cadastro">

        <form method="post" action="cadastrarUsuarioSalvar.php">

                <p>
                  <label for="txtNome">Nome:</label><br>
                  <input id="txtNome" name="txtNome" required="required" type="text" placeholder="Nome" />
                </p>
                <p>
                        <label for="txtCPF">CPF/CNPJ:</label><br>
                        <input id="txtCPF" name="txtCPF" required="required" type="text" placeholder="999 999 999 99"/>
                  </p>

                <p>
                  <label for="txtEmail">e-mail:</label><br>
                  <input id="txtEmail" name="txtEmail" required="required" type="email" placeholder="contato@htmlecsspro.com"/>
                </p>

                <p>
                  <label for="datNascimento">Data de nascimento:</label><br>
                  <input id="datNascimento" name="datNascimento" required="required" type="date" placeholder="01/01/2000"/>
                </p>
                <p>
                        <label for="txtTelefone">Telefone:</label><br>
                        <input id="txtTelefone" name="txtTelefone" required="required" type="text" placeholder="99999 9999" />
                </p>
                  <p>
                        <label for="txtSenha">Senha:</label><br>
                        <input id="txtSenha" name="txtSenha" required="required" type="password" placeholder="senha" /><br>
                        <input id="txtConfirmaSenha" name="txtConfirmaSenha" required="required" type="password" placeholder="Confirmar senha" />
                </p>
                <p>
                  <input  type="submit" value="Cadastrar"/>
                </p>
</div>
</body>
</html>
