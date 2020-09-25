<?php

require 'Usuario.class.php';
require 'config.php';

$u = new Usuario();



if(isset($_GET['senha']) && !empty($_GET['senha'])){
        
    $senha = addslashes($_GET['senha']);
        

    if($u->excluirUsuario($senha)){

        $_SESSION = array();
        echo"   <script language='javascript' type='text/javascript'>
                    alert('Usuário excluído com sucesso!');
                    window.location.href='index.php';
                </script>";
                
    }else{
        echo"   <script language='javascript' type='text/javascript'>
                    alert('Operação cancelada!');
                </script>";
    }
}
    ?>