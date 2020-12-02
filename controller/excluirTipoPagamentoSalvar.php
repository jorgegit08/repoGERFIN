<?php

require '../model/TipoPagamento.class.php';
require '../assets/util/conexaoDB.php';

$tp = new TipoPagamento();
$idTipoPagamento = $_POST['idTipoPagamento'];

if(isset($_POST['idTipoPagamento']) && !empty($_POST['idTipoPagamento']) ){

    $idTipoPagamento = addslashes($_POST['idTipoPagamento']);
    $tp->excluirTipoPagamento($idTipoPagamento);
    
    $titulo     = 'Sucesso!';
	$msg        = 'Tipo de pagamento excluído!';
	$icone      = 'success';
	$location   = '../view/consultarTipoPagamento.php';

}else{

	$titulo     = 'Erro!';
	$msg        = 'nenhum dado foi excluído!';
	$icone      = 'error';
	$location   = '../view/consultarTipoPagamento.php';

}

require '../assets/util/mensagemComum.php';

?>



