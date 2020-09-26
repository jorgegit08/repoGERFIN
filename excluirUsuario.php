<?php

require 'Usuario.class.php';
require 'conexaoDB.php';

$u = new Usuario();

if(isset($_GET['txtSenha']) && !empty($_GET['txtSenha'])){
        
    $txtSenha = addslashes($_GET['txtSenha']);
        
    if($u->excluirUsuario($txtSenha)){

        $_SESSION = array();
        echo"   <script language='javascript' type='text/javascript'>
                    alert('Usuário excluído com sucesso!');
                    window.location.href='index.php';
                </script>";

    }else{
        echo"   <script language='javascript' type='text/javascript'>
                    alert('Não foi possível excluir Usuário!');
					window.location.href='alterarUsuario.php';
                </script>";
    }
}
?>