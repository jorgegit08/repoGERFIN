<?php

require '../model/Recebimento.class.php';
require '../assets/util/conexaoDB.php';

$r = new Recebimento();
$idRecebimento = $_POST['idRecebimento'];

if(isset($_POST['idRecebimento']) && !empty($_POST['idRecebimento'])) {

    $idRecebimento = addslashes($_POST['idRecebimento']);
    $r->excluirRecebimento($idRecebimento);

    $titulo     = 'Sucesso!';
	$msg        = 'Dados do recebimento excluídos!';
	$icone      = 'success';
	$location   = '../view/consultarRecebimento.php';

}else{

	$titulo     = 'Erro!';
	$msg        = 'nenhum dado foi excluído!';
	$icone      = 'error';
	$location   = '../view/excluirRecebimento.php?idRecebimento='.$idRecebimento;

}

require '../assets/util/mensagemComum.php';

?>