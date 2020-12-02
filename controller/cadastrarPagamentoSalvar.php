<?php

require '../model/Pagamento.class.php';
require '../assets/util/conexaoDB.php';

$pg = new Pagamento();
$idTipoPagamento = $_POST['idTipoPagamento'];

if(isset($_POST['idTipoPagamento']) && !empty($_POST['idTipoPagamento'])
    &&    isset($_POST['txtDescricao']) && !empty($_POST['txtDescricao'])
    &&    isset($_POST['datVencimento']) && !empty($_POST['datVencimento'])
    &&    isset($_POST['vlrValor']) && !empty($_POST['vlrValor'])   ){

    $idTipoPagamento = addslashes($_POST['idTipoPagamento']);
    $txtDescricao = addslashes($_POST['txtDescricao']);
    $datVencimento = addslashes($_POST['datVencimento']);
    $datPagamento = addslashes($_POST['datPagamento']);
    $vlrValor = addslashes($_POST['vlrValor']);

    $pg->cadastrarPagamento($idTipoPagamento,$txtDescricao,$datVencimento,$datPagamento,$vlrValor);
    
    $titulo     = 'Sucesso!';
    $msg        = 'Dados do pagamento cadastrados!';
    $icone      = 'success';
    $location   = '../view/consultarPagamento.php';

}else{

    $titulo     = 'Erro!';
    $msg        = 'nenhum dado foi cadastrado!';
    $icone      = 'error';
    $location   = 'history.back()';

}

require '../assets/util/mensagemComum.php';

?>


