<?php

require '../model/Cliente.class.php';
require '../assets/util/conexaoDB.php';

$c = new Cliente();

if(isset($_POST['txtCNPJ']) && !empty($_POST['txtCNPJ'])
    &&    isset($_POST['txtContatoDireto']) && !empty($_POST['txtContatoDireto'])
    &&    isset($_POST['txtEmail']) && !empty($_POST['txtEmail'])
    &&    isset($_POST['txtEndereco']) && !empty($_POST['txtEndereco'])
    &&    isset($_POST['txtRazaoSocial']) && !empty($_POST['txtRazaoSocial'])
    &&    isset($_POST['txtTelefone']) && !empty($_POST['txtTelefone'])   ){

        $txtCNPJ = addslashes($_POST['txtCNPJ']);
        $txtContatoDireto = addslashes($_POST['txtContatoDireto']);
        $txtEmail = addslashes($_POST['txtEmail']);
        $txtEndereco = addslashes($_POST['txtEndereco']);
        $txtRazaoSocial = addslashes($_POST['txtRazaoSocial']);
        $txtTelefone = addslashes($_POST['txtTelefone']);
        $txtInscricaoEstadual = addslashes($_POST['txtInscricaoEstadual']);
		
        $c->cadastrarCliente($txtCNPJ,$txtContatoDireto,$txtEmail,$txtEndereco,$txtInscricaoEstadual,$txtRazaoSocial,$txtTelefone);
		
        $titulo     = 'Sucesso!';
        $msg        = 'Cliente cadastrado!';
        $icone      = 'success';
        $location   = '../view/consultarCliente.php';

}else{

    $titulo     = 'Erro!';
    $msg        = 'nenhum dado foi cadastrado!';
    $icone      = 'error';
    $location   = '../view/consultarCliente.php';

}

require '../assets/util/mensagemComum.php';

?>