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

    $email              = addslashes($_POST['txtEmail']);
    $cpf                = addslashes($_POST['txtCPF']);
    $nome               = addslashes($_POST['txtNome']);
    $senha              = addslashes($_POST['txtSenha']);
    $nascimento         = addslashes($_POST['datNascimento']);
    $telefone           = addslashes($_POST['txtTelefone']);
    
    $codigoValidacao    = rand(100000,999999);
    $conteudoEmail      = 'Autentique sua conta no GERFIN - Gerenciador Financeiro';
    $mensagemEmail      = 'Código para validação <b>'.$codigoValidacao.'</b>';  
    $msgErro            = 'Não foi possível enviar a mensagem.<br> Erro: ';
    $msgSucesso         = 'Cadastro realizado favor checar email ('.$email.') para validação!';
    
    $u->cadastrarUsuario($cpf,$nome,$senha,$email,$telefone,$nascimento,$codigoValidacao);
    
    $email = 'jorgin.silva@gmail.com';
    require '../assets/util/enviaEmail.php';
    
}else{

    $titulo     = 'Erro!';
    $msg        = 'Não foi feito nenhum cadastro!';
    $icone      = 'error';
    $location   = '../index.php';

}

require '../assets/util/mensagemComum.php';

?>


