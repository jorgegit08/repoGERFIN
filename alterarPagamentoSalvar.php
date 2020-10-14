<?php

require 'Pagamento.class.php';
require 'conexaoDB.php';


$pg = new Pagamento();
$idPagamento = $_POST['idPagamento'];
$idTipoPagamento = $_POST['idTipoPagamento'];

//$txtCnpj,$txtContatoDireto,$txtEmail,$txtEndereco,$txtInscricaoEstadual,$txtRazaoSocial,$txtTelefone

if(isset($_POST['idPagamento']) && !empty($_POST['idPagamento'])
    &&    isset($_POST['txtDescricao']) && !empty($_POST['txtDescricao'])
    &&    isset($_POST['datVencimento']) && !empty($_POST['datVencimento'])
    &&    isset($_POST['datPagamento']) && !empty($_POST['datPagamento'])
    &&    isset($_POST['vlrValor']) && !empty($_POST['vlrValor'])   ){

        $idPagamento = addslashes($_POST['idPagamento']);
        $txtDescricao = addslashes($_POST['txtDescricao']);
        $datVencimento = addslashes($_POST['datVencimento']);
        $datPagamento = addslashes($_POST['datPagamento']);
        $vlrValor = addslashes($_POST['vlrValor']);

        $pg->alterarPagamento($idPagamento,$idTipoPagamento,$txtDescricao,$datVencimento,$datPagamento,$vlrValor);

        echo"<script language='javascript' type='text/javascript'>
                alert('Dados do pagamento alterados!');
                window.location.href='consultarPagamento.php';
            </script>";
    }else{
       
        echo"<script language='javascript' type='text/javascript'>
            alert('nenhum dado foi alterado!');
            </script>";
        header("Location: alterarPagamento.php?idPagamento=".$idPagamento);
    }

    ?>



