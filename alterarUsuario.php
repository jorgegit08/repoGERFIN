<?php

require 'conexaoDB.php';
require 'Usuario.class.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
        <link href="css/style.css" rel="stylesheet">
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
<?php require 'menu.php';?>

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
