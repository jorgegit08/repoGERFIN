<?php

require '../model/TipoRecebimento.class.php';
require '../assets/util/conexaoDB.php';

$tr = new TipoRecebimento();
$idTipoRecebimento = $_POST['idTipoRecebimento'];

if(isset($_POST['idTipoRecebimento']) && !empty($_POST['idTipoRecebimento']) ){

    $idTipoRecebimento = addslashes($_POST['idTipoRecebimento']);
    $tr->excluirTipoRecebimento($idTipoRecebimento);

    $titulo     = 'Sucesso!';
	$msg        = 'Tipo de Recebimento excluído!';
	$icone      = 'success';
	$location   = '../view/consultarTipoRecebimento.php';

}else{

	$titulo     = 'Erro!';
	$msg        = 'nenhum dado foi excluído!';
	$icone      = 'error';
	$location   = '../view/consultarTipoRecebimento.php';

}

require '../assets/util/mensagemComum.php';

?>