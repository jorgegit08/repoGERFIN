<?php

require 'Cliente.class.php';
require 'conexaoDB.php';

$c = new Cliente();
$idCliente = $_POST['idCliente'];
//$txtCnpj,$txtContatoDireto,$txtEmail,$txtEndereco,$txtInscricaoEstadual,$txtRazaoSocial,$txtTelefone

if(isset($_POST['txtCnpj']) && !empty($_POST['txtCnpj'])
    &&    isset($_POST['txtContatoDireto']) && !empty($_POST['txtContatoDireto'])
    &&    isset($_POST['txtEmail']) && !empty($_POST['txtEmail'])
    &&    isset($_POST['txtEndereco']) && !empty($_POST['txtEndereco'])
    &&    isset($_POST['txtRazaoSocial']) && !empty($_POST['txtRazaoSocial'])
    &&    isset($_POST['txtTelefone']) && !empty($_POST['txtTelefone'])   ){

        $txtCnpj = addslashes($_POST['txtCnpj']);
        $txtContatoDireto = addslashes($_POST['txtContatoDireto']);
        $txtEmail = addslashes($_POST['txtEmail']);
        $txtEndereco = addslashes($_POST['txtEndereco']);
        $txtRazaoSocial = addslashes($_POST['txtRazaoSocial']);
        $txtTelefone = addslashes($_POST['txtTelefone']);
        $txtInscricaoEstadual = addslashes($_POST['txtInscricaoEstadual']);

        $c->alterarCliente($idCliente,$txtCnpj,$txtContatoDireto,$txtEmail,$txtEndereco,$txtInscricaoEstadual,$txtRazaoSocial,$txtTelefone);

        echo"<script language='javascript' type='text/javascript'>
                alert('Dados do cliente alterados!');
                window.location.href='consultarCliente.php';
            </script>";
    }else{
       
        echo"<script language='javascript' type='text/javascript'>
            alert('nenhum dado foi alterado!');
            </script>";
        header("Location: alterarCliente.php?idCliente=".$idCliente);
    }

    ?>



