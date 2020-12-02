<?php

require '../model/TipoRecebimento.class.php';
require '../assets/util/conexaoDB.php';

$tr = new TipoRecebimento();

if(isset($_POST['txtDescricao']) && !empty($_POST['txtDescricao']) ){

    $txtDescricao = addslashes($_POST['txtDescricao']);
    
    $tr->cadastrarTipoRecebimento($txtDescricao);
    
    $titulo     = 'Sucesso!';
    $msg        = 'Tipo de Recebimento cadastrado!';
    $icone      = 'success';
    $location   = '../view/consultarTipoRecebimento.php';

}else{

    $titulo     = 'Erro!';
    $msg        = 'nenhum dado foi cadastrado!';
    $icone      = 'error';
    $location   = '../view/consultarTipoRecebimento.php';

}

require '../assets/util/mensagemComum.php';

?>