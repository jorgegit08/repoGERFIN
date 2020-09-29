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

        $email = addslashes($_POST['txtEmail']);
        $cpf = addslashes($_POST['txtCPF']);
        $nome = addslashes($_POST['txtNome']);
        $senha = addslashes($_POST['txtSenha']);
        $nascimento = addslashes($_POST['datNascimento']);
        $telefone = addslashes($_POST['txtTelefone']);

        $u->cadastrarUsuario($cpf,$nome,$senha,$email,$telefone,$nascimento);

        echo"<script language='javascript' type='text/javascript'>
                alert('Cadastro realizado!');
                window.location.href='index.php';
            </script>";
    }else{
        header("Location: index.php");
    }

    ?>



