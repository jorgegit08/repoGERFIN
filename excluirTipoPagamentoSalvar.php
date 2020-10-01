<?php

require 'TipoPagamento.class.php';
require 'conexaoDB.php';

$tp = new TipoPagamento();
$idTipoPagamento = $_POST['idTipoPagamento'];
//$txtCnpj,$txtContatoDireto,$txtEmail,$txtEndereco,$txtInscricaoEstadual,$txtRazaoSocial,$txtTelefone


if(isset($_POST['idTipoPagamento']) && !empty($_POST['idTipoPagamento']) ){

    $idTipoPagamento = addslashes($_POST['idTipoPagamento']);
    
    $tp->excluirTipoPagamento($idTipoPagamento);
    
    echo"<script language='javascript' type='text/javascript'>
            alert('Tipo de pagamento excluído com sucesso!');
            window.location.href='consultarTipoPagamento.php';
        </script>";
}else{
    
    echo"<script language='javascript' type='text/javascript'>
            alert('nenhum dado foi excluído!');
        </script>";
    header("Location: consultarTipoPagamento.php");
}

?>



