<?php

require '../model/Pagamento.class.php';
require '../assets/util/conexaoDB.php';


$pg = new Pagamento();
$idPagamento = $_POST['idPagamento'];
$idTipoPagamento = $_POST['idTipoPagamento'];

if(isset($_POST['idPagamento']) && !empty($_POST['idPagamento'])
    &&    isset($_POST['txtDescricao']) && !empty($_POST['txtDescricao'])
    &&    isset($_POST['datVencimento']) && !empty($_POST['datVencimento'])
    &&    isset($_POST['vlrValor']) && !empty($_POST['vlrValor'])   ){

    $idPagamento = addslashes($_POST['idPagamento']);
    $txtDescricao = addslashes($_POST['txtDescricao']);
    $datVencimento = addslashes($_POST['datVencimento']);
    $datPagamento = addslashes($_POST['datPagamento']);
    $vlrValor = addslashes($_POST['vlrValor']);

    $pg->alterarPagamento($idPagamento,$idTipoPagamento,$txtDescricao,$datVencimento,$datPagamento,$vlrValor);

    $titulo     = 'Sucesso!';
    $msg        = 'Dados do pagamento alterados!';
    $icone      = 'success';
    $location   = '../view/consultarPagamento.php';

}else{   
    $titulo     = 'Erro!';
    $msg        = 'nenhum dado foi alterado!';
    $icone      = 'error';
    $location   = '../view/alterarPagamento.php?idPagamento='.$idPagamento;
}

require '../assets/util/mensagemComum.php';

?>



