<?php

require '../model/TipoPagamento.class.php';
require '../assets/util/conexaoDB.php';

$tp = new TipoPagamento();

if(isset($_POST['txtDescricao']) && !empty($_POST['txtDescricao']) ){

    $txtDescricao = addslashes($_POST['txtDescricao']);
    
    
    $tp->cadastrarTipoPagamento($txtDescricao);
    
    $titulo     = 'Sucesso!';
    $msg        = 'Tipo de pagamento cadastrado com sucesso!';
    $icone      = 'success';
    $location   = '../view/consultarTipoPagamento.php';

}else{

    $titulo     = 'Erro!';
    $msg        = 'nenhum dado foi cadastrado!';
    $icone      = 'error';
    $location   = '../view/consultarTipoPagamento.php';

}

require '../assets/util/mensagemComum.php';

?>