<?php

require '../model/Recebimento.class.php';
require '../assets/util/conexaoDB.php';


$r = new Recebimento();
$idRecebimento= $_POST['idRecebimento'];

if(isset($_POST['idTipoRecebimento']) && !empty($_POST['idTipoRecebimento'])
    &&    isset($_POST['idCliente']) && !empty($_POST['idCliente'])
    &&    isset($_POST['txtContrato']) && !empty($_POST['txtContrato'])
    &&    isset($_POST['txtGestor']) && !empty($_POST['txtGestor'])
    &&    isset($_POST['txtDescricao']) && !empty($_POST['txtDescricao'])
    &&    isset($_POST['vlrBruto']) && !empty($_POST['vlrBruto'])
    &&    isset($_POST['vlrLiquido']) && !empty($_POST['vlrLiquido'])
    &&    isset($_POST['datVencimento']) && !empty($_POST['datVencimento'])
    &&    isset($_POST['datEmissao']) && !empty($_POST['datEmissao'])
    &&    isset($_POST['numNFe']) && !empty($_POST['numNFe'])   ){

    $idTipoRecebimento = addslashes($_POST['idTipoRecebimento']);
    $idCliente = addslashes($_POST['idCliente']);
    $txtContrato = addslashes($_POST['txtContrato']);
    $txtGestor = addslashes(utf8_decode( $_POST['txtGestor'] ));
    $txtDescricao = addslashes(utf8_decode( $_POST['txtDescricao'] );
    $vlrBruto = addslashes($_POST['vlrBruto']);
    $vlrLiquido = addslashes($_POST['vlrLiquido']);
    $datVencimento = addslashes($_POST['datVencimento']);
    $datPagamento = addslashes($_POST['datPagamento']);
    $numNFe = addslashes($_POST['numNFe']);
    $indCancelado = addslashes($_POST['indCancelado']);
    $datEmissao = addslashes($_POST['datEmissao']);

    $r->alterarRecebimento($idRecebimento,$idCliente,$txtContrato,$txtGestor,$idTipoRecebimento,$txtDescricao,$vlrBruto,$vlrLiquido,$datVencimento,$datPagamento,$numNFe,$indCancelado,$datEmissao);
    
    $titulo     = 'Sucesso!';
    $msg        = 'Dados do Recebimento alterados!';
    $icone      = 'success';
    $location   = '../view/consultarRecebimento.php';

}else{
    $titulo     = 'Erro!';
    $msg        = 'nenhum dado foi alterado!';
    $icone      = 'error';
    $location   = '../view/alterarRecebimento.php?idRecebimento='.$idRecebimento;

}

require '../assets/util/mensagemComum.php';

?>



