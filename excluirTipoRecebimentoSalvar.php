<?php

require 'TipoRecebimento.class.php';
require 'conexaoDB.php';

$tr = new TipoRecebimento();
$idTipoRecebimento = $_POST['idTipoRecebimento'];
//$txtCnpj,$txtContatoDireto,$txtEmail,$txtEndereco,$txtInscricaoEstadual,$txtRazaoSocial,$txtTelefone


if(isset($_POST['idTipoRecebimento']) && !empty($_POST['idTipoRecebimento']) ){

    $idTipoRecebimento = addslashes($_POST['idTipoRecebimento']);
    
    $tr->excluirTipoRecebimento($idTipoRecebimento);
    
    echo"<script language='javascript' type='text/javascript'>
            alert('Tipo de Recebimento excluído com sucesso!');
            window.location.href='consultarTipoRecebimento.php';
        </script>";
}else{
    
    echo"<script language='javascript' type='text/javascript'>
            alert('nenhum dado foi excluído!');
        </script>";
    header("Location: consultarTipoRecebimento.php");
}

?>



