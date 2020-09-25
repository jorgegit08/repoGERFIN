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
<h1 class="tit">Cadastro</h1>
<div class="cadastro">

        <form method="post" action="cadastrarUsuarioSalvar.php">

                <p>
                  <label for="nome">Nome:</label><br>
                  <input id="nome" name="nome" required="required" type="text" placeholder="Nome" />
                </p>
                <p>
                        <label for="cpf">CPF/CNPJ:</label><br>
                        <input id="cpf" name="cpf" required="required" type="text" placeholder="999 999 999 99"/>
                  </p>

                <p>
                  <label for="email">e-mail:</label><br>
                  <input id="email" name="email" required="required" type="email" placeholder="contato@htmlecsspro.com"/>
                </p>

                <p>
                  <label for="nascimento">Data de nascimento:</label><br>
                  <input id="nascimento" name="nascimento" required="required" type="date" placeholder="01/01/2000"/>
                </p>
                <p>
                        <label for="telefone">Telefone:</label><br>
                        <input id="telefone" name="telefone" required="required" type="text" placeholder="99999 9999" />
                </p>
                  <p>
                        <label for="senha">Senha:</label><br>
                        <input id="senha" name="senha" required="required" type="password" placeholder="senha" /><br>
                        <input id="senha" name="senha" required="required" type="password" placeholder="Confirmar senha" />
                </p>
                <p>
                  <input  type="submit" value="Cadastrar"/>
                </p>
</div>
</body>
</html>
