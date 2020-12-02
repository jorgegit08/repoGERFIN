<?php

require '../model/TipoRecebimento.class.php';
require '../assets/util/conexaoDB.php';

$tr = new TipoRecebimento();
$idTipoRecebimento = $_POST['idTipoRecebimento'];

if(isset($_POST['txtDescricao']) && !empty($_POST['txtDescricao'])
&&    isset($_POST['idTipoRecebimento']) && !empty($_POST['idTipoRecebimento']) ){

    $txtDescricao = addslashes(utf8_decode( $_POST['txtDescricao'] ));
    $idTipoRecebimento = addslashes($_POST['idTipoRecebimento']);
    
    
    $tr->alterarTipoRecebimento($idTipoRecebimento,$txtDescricao);
    
    $titulo     = 'Sucesso!';
    $msg        = 'Tipo de recebimento alterado com sucesso!';
    $icone      = 'success';
    $location   = '../view/consultarTipoRecebimento.php';

}else{
    $titulo     = 'Erro!';
    $msg        = 'nenhum dado foi alterado!';
    $icone      = 'error';
    $location   = '../view/consultarTipoRecebimento.php';

}

require '../assets/util/mensagemComum.php';

?>

