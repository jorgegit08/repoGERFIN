<?php

require 'TipoRecebimento.class.php';
require 'conexaoDB.php';

$tr = new TipoRecebimento();

if(isset($_POST['txtDescricao']) && !empty($_POST['txtDescricao']) ){

        $txtDescricao = addslashes($_POST['txtDescricao']);
		
        $tr->cadastrarTipoRecebimento($txtDescricao);
		
        echo"<script language='javascript' type='text/javascript'>
                alert('Tipo de Recebimento cadastrado com sucesso!');
                window.location.href='consultarTipoRecebimento.php';
            </script>";
    }else{
		
        echo"<script language='javascript' type='text/javascript'>
				alert('nenhum dado foi cadastrado!');
            </script>";
        header("Location: consultarTipoRecebimento.php");
    }
    
    ?>
