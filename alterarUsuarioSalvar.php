<?php

require 'Usuario.class.php';
require 'conexaoDB.php';

$u = new Usuario();


if(isset($_POST['txtEmail']) && !empty($_POST['txtEmail'])
    &&    isset($_POST['txtCPF']) && !empty($_POST['txtCPF'])
    &&    isset($_POST['txtSenha']) && !empty($_POST['txtSenha'])
    &&    isset($_POST['txtNome']) && !empty($_POST['txtNome'])
    &&    isset($_POST['datNascimento']) && !empty($_POST['datNascimento'])
    &&    isset($_POST['txtTelefone']) && !empty($_POST['txtTelefone'])   ){

        $txtEmail = addslashes($_POST['txtEmail']);
        $txtCPF = addslashes($_POST['txtCPF']);
        $txtNome = addslashes($_POST['txtNome']);
        $txtSenha = addslashes($_POST['txtSenha']);
        $datNascimento = addslashes($_POST['datNascimento']);
        $txtTelefone = addslashes($_POST['txtTelefone']);

        $u->alterarUsuario($txtCPF,$txtNome,$txtSenha,$txtEmail,$txtTelefone,$datNascimento);

        echo"<script language='javascript' type='text/javascript'>
                alert('Dados do usuário alterados!');
                window.location.href='alterarUsuario.php';
            </script>";
    }else{
		echo"<script language='javascript' type='text/javascript'>
                alert('Não foi possível alterar usuário!');
				</script>";
        header("Location: alterarUsuario.php");
    }

    ?>



