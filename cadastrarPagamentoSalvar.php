<?php

require 'Pagamento.class.php';
require 'conexaoDB.php';


$pg = new Pagamento();
$idTipoPagamento = $_POST['idTipoPagamento'];

//$txtCnpj,$txtContatoDireto,$txtEmail,$txtEndereco,$txtInscricaoEstadual,$txtRazaoSocial,$txtTelefone

if(isset($_POST['idTipoPagamento']) && !empty($_POST['idTipoPagamento'])
    &&    isset($_POST['txtDescricao']) && !empty($_POST['txtDescricao'])
    &&    isset($_POST['datVencimento']) && !empty($_POST['datVencimento'])
    &&    isset($_POST['vlrValor']) && !empty($_POST['vlrValor'])   ){

        $idTipoPagamento = addslashes($_POST['idTipoPagamento']);
        $txtDescricao = addslashes($_POST['txtDescricao']);
        $datVencimento = addslashes($_POST['datVencimento']);
        $datPagamento = addslashes($_POST['datPagamento']);
        $vlrValor = addslashes($_POST['vlrValor']);

        $pg->cadastrarPagamento($idTipoPagamento,$txtDescricao,$datVencimento,$datPagamento,$vlrValor);

        echo"<script language='javascript' type='text/javascript'>
                alert('Dados do pagamento cadastrados!');
                window.location.href='consultarPagamento.php';
            </script>";
    }else{
       
        echo"<script language='javascript' type='text/javascript'>
            alert('nenhum dado foi cadastrado!');
            window.location.href=history.back();
            </script>";
        
    }

    ?>



