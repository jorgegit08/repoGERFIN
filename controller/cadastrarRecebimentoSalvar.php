<?php

require '../model/Recebimento.class.php';
require '../assets/util/conexaoDB.php';

$r = new Recebimento();

if(isset($_POST['idTipoRecebimento']) && !empty($_POST['idTipoRecebimento'])
    &&    isset($_POST['idCliente']) && !empty($_POST['idCliente'])
    &&    isset($_POST['txtContrato']) && !empty($_POST['txtContrato'])
    &&    isset($_POST['txtGestor']) && !empty($_POST['txtGestor'])
    &&    isset($_POST['txtDescricao']) && !empty($_POST['txtDescricao'])
    &&    isset($_POST['vlrBruto']) && !empty($_POST['vlrBruto'])
    &&    isset($_POST['vlrLiquido']) && !empty($_POST['vlrLiquido'])
    &&    isset($_POST['datVencimento']) && !empty($_POST['datVencimento'])
    &&    isset($_POST['numNFe']) && !empty($_POST['numNFe'])
    &&    isset($_POST['datEmissao']) && !empty($_POST['datEmissao'])   ){

    $idTipoRecebimento = addslashes($_POST['idTipoRecebimento']);
    $idCliente = addslashes($_POST['idCliente']);
    $txtContrato = addslashes($_POST['txtContrato']);
    $txtGestor = addslashes($_POST['txtGestor']);
    $txtDescricao = addslashes($_POST['txtDescricao']);
    $vlrBruto = addslashes($_POST['vlrBruto']);
    $vlrLiquido = addslashes($_POST['vlrLiquido']);
    $datEmissao = addslashes($_POST['datEmissao']);
    $datVencimento = addslashes($_POST['datVencimento']);
    $datPagamento = addslashes($_POST['datPagamento']);
    $numNFe = addslashes($_POST['numNFe']);
    $indCancelado = addslashes($_POST['indCancelado']);

    $r->cadastrarRecebimento($idTipoRecebimento,$idCliente,$txtContrato,$txtGestor,$txtDescricao,$vlrBruto,$vlrLiquido,$datVencimento,$datPagamento,$numNFe,$indCancelado,$datEmissao);

    $titulo     = 'Sucesso!';
    $msg        = 'Dados do Recebimento cadastrados!';
    $icone      = 'success';
    $location   = '../view/consultarRecebimento.php';

}else{

    $titulo     = 'Erro!';
    $msg        = 'nenhum dado foi cadastrado!';
    $icone      = 'error';
    $location   = 'history.back()';

}

require '../assets/util/mensagemComum.php';

?>

