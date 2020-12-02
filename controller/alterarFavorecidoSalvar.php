<?php

require '../model/Favorecido.class.php';
require '../assets/util/conexaoDB.php';

$f = new Favorecido();
$idFavorecido = $_POST['idFavorecido'];

if(isset($_POST['txtNome']) && !empty($_POST['txtNome']) ){

    $txtNome = addslashes(utf8_decode( $_POST['txtNome']));
    $txtCPFCNPJ = addslashes($_POST['txtCPFCNPJ']);
    $datNascimento = addslashes($_POST['datNascimento']);
    $txtEmail = addslashes($_POST['txtEmail']);
    $txtOAB = addslashes($_POST['txtOAB']);
    $txtEndereco = addslashes($_POST['txtEndereco']);
    $txtTelefone = addslashes($_POST['txtTelefone']);

    $f->alterarFavorecido($idFavorecido,$txtNome,$txtCPFCNPJ,$datNascimento,$txtEmail,$txtOAB,$txtEndereco,$txtTelefone);

    $titulo     = 'Sucesso!';
    $msg        = 'Dados do Favorecido alterados!';
    $icone      = 'success';
    $location   = '../view/consultarFavorecido.php';

}else{
    $titulo     = 'Erro!';
    $msg        = 'nenhum dado foi alterado!';
    $icone      = 'error';
    $location   = '../view/alterarFavorecido.php?idFavorecido='.$idFavorecido;
}

require '../assets/util/mensagemComum.php';

?>