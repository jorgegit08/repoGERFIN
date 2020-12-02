<?php

require '../model/Favorecido.class.php';
require '../assets/util/conexaoDB.php';

$f = new Favorecido();

if(isset($_POST['txtNome']) && !empty($_POST['txtNome'])
    &&    isset($_POST['txtCPFCNPJ']) && !empty($_POST['txtCPFCNPJ'])
    &&    isset($_POST['datNascimento']) && !empty($_POST['datNascimento'])
    &&    isset($_POST['txtEmail']) && !empty($_POST['txtEmail'])
    &&    isset($_POST['txtEndereco']) && !empty($_POST['txtEndereco'])   
    &&    isset($_POST['txtTelefone']) && !empty($_POST['txtTelefone'])){

    $txtNome = addslashes($_POST['txtNome']);
    $txtCPFCNPJ = addslashes($_POST['txtCPFCNPJ']);
    $datNascimento = addslashes($_POST['datNascimento']);
    $txtEmail = addslashes($_POST['txtEmail']);
    $txtOAB = addslashes($_POST['txtOAB']);
    $txtEndereco = addslashes($_POST['txtEndereco']);
    $txtTelefone = addslashes($_POST['txtTelefone']);
    
    $f->cadastrarFavorecido($txtNome,$txtCPFCNPJ,$datNascimento,$txtEmail,$txtOAB,$txtEndereco,$txtTelefone);
 
    $titulo     = 'Sucesso!';
    $msg        = 'Favorecido cadastrado!';
    $icone      = 'success';
    $location   = '../view/consultarFavorecido.php';

}else{

    $titulo     = 'Erro!';
    $msg        = 'nenhum dado foi cadastrado!';
    $icone      = 'error';
    $location   = 'history.back()';

}

require '../assets/util/mensagemComum.php';

?>
