<?php

require '../model/Usuario.class.php';
require '../assets/util/conexaoDB.php';

$u = new Usuario();

if(isset($_POST['codValidacao']) && !empty($_POST['codValidacao']) ){
    
    $u->consultarUsuario();
    $codigoGerado   = $u->codValidacao;
    $codDigitado    = addslashes($_POST['codValidacao']);   
    
    if( $codigoGerado == $codDigitado ){
        
        $u->validarUsuario($u->idUsuario);

        $titulo     = 'Sucesso!';
        $msg        = 'Conta validada!';
        $icone      = 'success';
        $location   = '../view/paginaInicial.php';
        
    }else{

        $titulo     = 'Erro';
        $msg        = 'O código digitado não confere com o enviado ao e-mail: ' . $u->txtEmail;
        $icone      = 'error';
        $location   = '../view/validarConta.php';
        
    }
}else{

    $titulo     = 'Erro!';
    $msg        = 'Dados inválidos, retorno ao início';
    $icone      = 'error';
    $location   = '../index.php';
}

require '../assets/util/mensagemComum.php';

?>



