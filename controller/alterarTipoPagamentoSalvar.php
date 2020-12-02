<?php

require '../model/TipoPagamento.class.php';
require '../assets/util/conexaoDB.php';

$tp = new TipoPagamento();
$idTipoPagamento = $_POST['idTipoPagamento'];

if(isset($_POST['txtDescricao']) && !empty($_POST['txtDescricao'])
    && isset($_POST['idTipoPagamento']) && !empty($_POST['idTipoPagamento']) ){

    $txtDescricao = addslashes(utf8_decode( $_POST['txtDescricao'] ));
    $idTipoPagamento = addslashes($_POST['idTipoPagamento']);
    
    
    $tp->alterarTipoPagamento($idTipoPagamento,$txtDescricao);
    
    $titulo     = 'Sucesso!';
    $msg        = 'Tipo de pagamento alterado com sucesso!';
    $icone      = 'success';
    $location   = '../view/consultarTipoPagamento.php';

}else{
    $titulo     = 'Erro!';
    $msg        = 'nenhum dado foi alterado!';
    $icone      = 'error';
    $location   = '../view/consultarTipoPagamento.php';

}

require '../assets/util/mensagemComum.php';

?>