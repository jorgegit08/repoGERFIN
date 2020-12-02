<?php

require '../model/Usuario.class.php';
require '../assets/util/conexaoDB.php';

$u = new Usuario();

if(isset($_GET['txtSenha']) && !empty($_GET['txtSenha'])){
        
    $txtSenha = addslashes($_GET['txtSenha']);
    ?>
    <script src='/TCC/assets/util/escondeParametros.js'></script>
    <?php
        
    if($u->excluirUsuario($txtSenha)){

        $_SESSION = array();
       
        $titulo     = 'Sucesso!';
        $msg        = 'Usuário excluído!';
        $icone      = 'success';
        $location   = '../index.php';

    }else{

        $titulo     = 'Erro!';
        $msg        = 'Não foi possível excluir Usuário!';
        $icone      = 'error';
        $location   = '../view/alterarUsuario.php';

    }
}else{

    $titulo     = 'Erro!';
    $msg        = 'Dados inválidos, não foi possível prosseguir!';
    $icone      = 'error';
    $location   = '../view/alterarUsuario.php';

}

require '../assets/util/mensagemComum.php';

?>