<?php

require 'Recebimento.class.php';
require 'conexaoDB.php';


$r = new Recebimento();


if(isset($_POST['idTipoRecebimento']) && !empty($_POST['idTipoRecebimento'])
    &&    isset($_POST['idCliente']) && !empty($_POST['idCliente'])
    &&    isset($_POST['txtContrato']) && !empty($_POST['txtContrato'])
    &&    isset($_POST['txtGestor']) && !empty($_POST['txtGestor'])
    &&    isset($_POST['txtDescricao']) && !empty($_POST['txtDescricao'])
    &&    isset($_POST['vlrBruto']) && !empty($_POST['vlrBruto'])
    &&    isset($_POST['vlrLiquido']) && !empty($_POST['vlrLiquido'])
    &&    isset($_POST['datVencimento']) && !empty($_POST['datVencimento'])
    &&    isset($_POST['datPagamento']) && !empty($_POST['datPagamento'])
    &&    isset($_POST['numNFe']) && !empty($_POST['numNFe'])   ){

        $idTipoRecebimento = addslashes($_POST['idTipoRecebimento']);
        $idCliente = addslashes($_POST['idCliente']);
        $txtContrato = addslashes($_POST['txtContrato']);
        $txtGestor = addslashes($_POST['txtGestor']);
        $txtDescricao = addslashes($_POST['txtDescricao']);
        $vlrBruto = addslashes($_POST['vlrBruto']);
        $vlrLiquido = addslashes($_POST['vlrLiquido']);
        $datVencimento = addslashes($_POST['datVencimento']);
        $datPagamento = addslashes($_POST['datPagamento']);
        $numNFe = addslashes($_POST['numNFe']);

        $r->cadastrarRecebimento($idTipoRecebimento,$idCliente,$txtContrato,$txtGestor,$txtDescricao,$vlrBruto,$vlrLiquido,$datVencimento,$datPagamento,$numNFe);

        echo"<script language='javascript' type='text/javascript'>
                alert('Dados do Recebimento cadastrados!');
                window.location.href='consultarRecebimento.php';
            </script>";
    }else{
       
        echo"<script language='javascript' type='text/javascript'>
            alert('nenhum dado foi cadastrado!');
            window.location.href=history.back();
            </script>";
        
    }

    ?>



