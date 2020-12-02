<?php

require '../model/Cliente.class.php';
require '../assets/util/conexaoDB.php';

$c = new Cliente();

if( isset($_POST['idCliente']) && !empty($_POST['idCliente']) ){
	
	$idCliente = $_POST['idCliente'];
    $c->excluirCliente($idCliente);

	$titulo     = 'Sucesso!';
	$msg        = 'Cliente excluído com sucesso!';
	$icone      = 'success';
	$location   = '../view/consultarCliente.php';

}else{

	$titulo     = 'Erro!';
	$msg        = 'Nenhum cliente foi excluído!';
	$icone      = 'error';
	$location   = '../view/excluirCliente.php?idCliente='.$idCliente;

}

require '../assets/util/mensagemComum.php';

?>



