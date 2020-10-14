<?php

require 'TipoRecebimento.class.php';
require 'conexaoDB.php';

$tr = new TipoRecebimento();
$idTipoRecebimento = $_POST['idTipoRecebimento'];
//$txtCnpj,$txtContatoDireto,$txtEmail,$txtEndereco,$txtInscricaoEstadual,$txtRazaoSocial,$txtTelefone


if(isset($_POST['txtDescricao']) && !empty($_POST['txtDescricao'])
&&    isset($_POST['idTipoRecebimento']) && !empty($_POST['idTipoRecebimento']) ){

    $txtDescricao = addslashes($_POST['txtDescricao']);
    $idTipoRecebimento = addslashes($_POST['idTipoRecebimento']);
    
    
    $tr->alterarTipoRecebimento($idTipoRecebimento,$txtDescricao);
    
    echo"<script language='javascript' type='text/javascript'>
            alert('Tipo de Recebimento alterado com sucesso!');
            window.location.href='consultarTipoRecebimento.php';
        </script>";
}else{
    
    echo"<script language='javascript' type='text/javascript'>
            alert('nenhum dado foi alterado!');
        </script>";
    header("Location: consultarTipoRecebimento.php");
}

?>



