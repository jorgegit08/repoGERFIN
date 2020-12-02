<?php

require '../model/Usuario.class.php';
require '../assets/util/conexaoDB.php';

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

    $titulo     = 'Sucesso!';
    $msg        = 'Dados do usuário alterados!';
    $icone      = 'success';
    $location   = '../view/alterarUsuario.php';

}else{

    $titulo     = 'Erro!';
    $msg        = 'Não foi possível alterar usuário!';
    $icone      = 'error';
    $location   = '../view/alterarUsuario.php';

}

require '../assets/util/mensagemComum.php';

?>
