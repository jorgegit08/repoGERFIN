<?php

require 'TipoPagamento.class.php';
require 'conexaoDB.php';

$tp = new TipoPagamento();

if(isset($_POST['txtDescricao']) && !empty($_POST['txtDescricao']) ){

        $txtDescricao = addslashes($_POST['txtDescricao']);
        
		
        $tp->cadastrarTipoPagamento($txtDescricao);
		
        echo"<script language='javascript' type='text/javascript'>
                alert('Tipo de pagamento cadastrado com sucesso!');
                window.location.href='consultarTipoPagamento.php';
            </script>";
    }else{
		
        echo"<script language='javascript' type='text/javascript'>
				alert('nenhum dado foi cadastrado!');
            </script>";
        header("Location: consultarTipoPagamento.php");
    }

    ?>
