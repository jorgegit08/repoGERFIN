<?php

require 'Pagamento.class.php';
require 'conexaoDB.php';


$pg = new Pagamento();
$idTipoPagamento = 6;


if(isset($_POST['txtNome']) && !empty($_POST['txtNome'])
    &&    isset($_POST['vlrPercent']) && !empty($_POST['vlrPercent'])
    &&    isset($_POST['data']) && !empty($_POST['data']){
        if(is_array($_POST['txtNome'])){
            foreach ($_POST['txtNome'] as $i => $RegistroAtual) {
                $txtDescricao = addslashes($RegistroAtual);
                $vlrPercent = addslashes($_POST['vlrPercent'][$i]);
                $data = addslashes($_POST['data'][$i]);

                $pg->cadastrarPagamento($idTipoPagamento,$txtDescricao,$data,$data,$vlrPercent);

                
            }
            echo"<script language='javascript' type='text/javascript'>
                        alert('Dados da distribuição de lucro cadastrados !');
                        window.location.href='consultarPagamento.php';
                    </script>";
        }else{
            $txtDescricao = addslashes($_POST['txtNome']);
            $vlrPercent = addslashes($_POST['vlrPercent']);
            $data = addslashes($_POST['data']);

            $pg->cadastrarPagamento($idTipoPagamento,$txtDescricao,$data,$data,$vlrPercent);

            echo"<script language='javascript' type='text/javascript'>
                    alert('Dados da distribuição de lucro cadastrados !');
                    window.location.href='consultarPagamento.php';
                </script>";
        }

    }else{
       
        echo"<script language='javascript' type='text/javascript'>
        alert('nenhum dado foi cadastrado!');
        window.location.href=history.back();
        </script>";
    }

    ?>



