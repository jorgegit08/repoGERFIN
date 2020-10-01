<?php

require 'TipoPagamento.class.php';
require 'conexaoDB.php';

$tp = new TipoPagamento();
$idTipoPagamento = $_POST['idTipoPagamento'];
//$txtCnpj,$txtContatoDireto,$txtEmail,$txtEndereco,$txtInscricaoEstadual,$txtRazaoSocial,$txtTelefone


if(isset($_POST['txtDescricao']) && !empty($_POST['txtDescricao'])
&&    isset($_POST['idTipoPagamento']) && !empty($_POST['idTipoPagamento']) ){

    $txtDescricao = addslashes($_POST['txtDescricao']);
    $idTipoPagamento = addslashes($_POST['idTipoPagamento']);
    
    
    $tp->alterarTipoPagamento($idTipoPagamento,$txtDescricao);
    
    echo"<script language='javascript' type='text/javascript'>
            alert('Tipo de pagamento alterado com sucesso!');
            window.location.href='consultarTipoPagamento.php';
        </script>";
}else{
    
    echo"<script language='javascript' type='text/javascript'>
            alert('nenhum dado foi alterado!');
        </script>";
    header("Location: consultarTipoPagamento.php");
}

?>



