<?php

require 'Pagamento.class.php';
require 'conexaoDB.php';


$pg = new Pagamento();
$idPagamento = $_POST['idPagamento'];


//$txtCnpj,$txtContatoDireto,$txtEmail,$txtEndereco,$txtInscricaoEstadual,$txtRazaoSocial,$txtTelefone

if(isset($_POST['idPagamento']) && !empty($_POST['idPagamento'])) {

        $idPagamento = addslashes($_POST['idPagamento']);

        $pg->excluirPagamento($idPagamento,$idTipoPagamento,$txtDescricao,$datVencimento,$datPagamento,$vlrValor);

        echo"<script language='javascript' type='text/javascript'>
                alert('Dados do pagamento excluídos!');
                window.location.href='consultarPagamento.php';
            </script>";
    }else{
       
        echo"<script language='javascript' type='text/javascript'>
            alert('nenhum dado foi excluído!');
            </script>";
        header("Location: excluirPagamento.php?idPagamento=".$idPagamento);
    }

    ?>



