<?php

require 'Recebimento.class.php';
require 'conexaoDB.php';

$r = new Recebimento();
$idRecebimento = $_POST['idRecebimento'];

if(isset($_POST['idRecebimento']) && !empty($_POST['idRecebimento'])) {

        $idRecebimento = addslashes($_POST['idRecebimento']);

        $r->excluirRecebimento($idRecebimento);

        echo"<script language='javascript' type='text/javascript'>
                alert('Dados do recebimento excluídos!');
                window.location.href='consultarRecebimento.php';
            </script>";
    }else{
       
        echo"<script language='javascript' type='text/javascript'>
                alert('nenhum dado foi excluído!');
            </script>";
        header("Location: excluirPagamento.php?idRecebimento=".$idRecebimento);
    }

    ?>



