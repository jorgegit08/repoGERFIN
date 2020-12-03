<?php

require '../assets/util/conexaoDB.php';
require '../model/Usuario.class.php';

$u=new Usuario;

if( isset($_POST['txtEmail']) && !empty($_POST['txtEmail']) && isset($_POST['txtSenha']) && !empty($_POST['txtSenha'])){

	$txtEmail = addslashes($_POST['txtEmail'] . '@asj.adv.br');
	$txtSenha = addslashes($_POST['txtSenha']);

	if( $u->login($txtEmail,$txtSenha) ){
		if( isset( $_SESSION['txtEmail'] ) && $u->indSituacao == 1 ){
			header("Location: paginaInicial.php");
		}else if( isset( $_SESSION['txtEmail'] ) && $u->indSituacao == 0 ){
			header("Location: validarConta.php?txtEmail=" . $_SESSION['txtEmail']);
		}else {
			header("Location: ../index.php");
		}

	}else{
		
		$titulo 	= 'Erro!';
		$msg 		= 'Login e/ou senha incorretos';
		$icone 		= 'error';
		$location 	= '../index.php';
		
	}

}else{
	
	$titulo 	= 'Erro!';
	$msg 		= 'Dados inválidos, retorno ao início';
	$icone 		= 'error';
	$location 	= '../index.php';
}

require '../assets/util/mensagemComum.php';

?>