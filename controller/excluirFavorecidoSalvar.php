<?php

require '../model/Favorecido.class.php';
require '../assets/util/conexaoDB.php';

$f = new Favorecido();

if( isset($_POST['idFavorecido']) && !empty($_POST['idFavorecido']) ){
	
	$idFavorecido = $_POST['idFavorecido'];
    $f->excluirFavorecido($idFavorecido);
	
	$titulo     = 'Sucesso!';
	$msg        = 'Favorecido excluído!';
	$icone      = 'success';
	$location   = '../view/consultarFavorecido.php';

}else{

	$titulo     = 'Erro!';
	$msg        = 'Nenhum Favorecido foi excluído!';
	$icone      = 'error';
	$location   = '../view/excluirFavorecido.php?idFavorecido='.$idFavorecido;

}

require '../assets/util/mensagemComum.php';

?>



