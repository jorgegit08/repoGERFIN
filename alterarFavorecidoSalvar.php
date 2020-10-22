<?php

require 'Favorecido.class.php';
require 'conexaoDB.php';

$f = new Favorecido();
$idFavorecido = $_POST['idFavorecido'];
//$txtCnpj,$txtContatoDireto,$txtEmail,$txtEndereco,$txtInscricaoEstadual,$txtRazaoSocial,$txtTelefone

if(isset($_POST['txtNome']) && !empty($_POST['txtNome'])
    &&    isset($_POST['txtCPF']) && !empty($_POST['txtCPF'])
    &&    isset($_POST['datNascimento']) && !empty($_POST['datNascimento'])
    &&    isset($_POST['txtEmail']) && !empty($_POST['txtEmail'])
    &&    isset($_POST['txtOAB']) && !empty($_POST['txtOAB'])
    &&    isset($_POST['txtEndereco']) && !empty($_POST['txtEndereco'])
    &&    isset($_POST['txtTelefone']) && !empty($_POST['txtTelefone'])   ){

        $txtNome = addslashes($_POST['txtNome']);
        $txtCPF = addslashes($_POST['txtCPF']);
        $datNascimento = addslashes($_POST['datNascimento']);
        $txtEmail = addslashes($_POST['txtEmail']);
        $txtOAB = addslashes($_POST['txtOAB']);
        $txtEndereco = addslashes($_POST['txtEndereco']);
        $txtTelefone = addslashes($_POST['txtTelefone']);

        $f->alterarFavorecido($idFavorecido,$txtNome,$txtCPF,$datNascimento,$txtEmail,$txtOAB,$txtEndereco,$txtTelefone);

        echo"<script language='javascript' type='text/javascript'>
                alert('Dados do Favorecido alterados!');
                window.location.href='consultarFavorecido.php';
            </script>";
    }else{
       
        echo"<script language='javascript' type='text/javascript'>
            alert('nenhum dado foi alterado!');
            </script>";
        header("Location: alterarFavorecido.php?idFavorecido=".$idFavorecido);
    }

    ?>



