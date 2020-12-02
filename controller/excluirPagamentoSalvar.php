<?php

require '../model/Pagamento.class.php';
require '../assets/util/conexaoDB.php';

$pg = new Pagamento();
$idPagamento = $_POST['idPagamento'];

if(isset($_POST['idPagamento']) && !empty($_POST['idPagamento'])) {

    $idPagamento = addslashes($_POST['idPagamento']);
    $pg->excluirPagamento($idPagamento);

    $titulo     = 'Sucesso!';
	$msg        = 'Dados do pagamento excluídos!';
	$icone      = 'success';
	$location   = '../view/consultarPagamento.php';

}else{

	$titulo     = 'Erro!';
	$msg        = 'nenhum dado foi excluído!';
	$icone      = 'error';
	$location   = '../view/excluirPagamento.php?idPagamento='.$idPagamento;

}

require '../assets/util/mensagemComum.php';

?>

