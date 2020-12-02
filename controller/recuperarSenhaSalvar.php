<?php

require '../model/Usuario.class.php';
require '../assets/util/conexaoDB.php';

$u = new Usuario();


if(isset($_POST['txtEmail']) && !empty($_POST['txtEmail'])
    &&    isset($_POST['txtTelefone']) && !empty($_POST['txtTelefone'])   ){

    $email = addslashes($_POST['txtEmail']);
    $telefone = addslashes($_POST['txtTelefone']);

    $novaSenha = $u->recuperarSenha($email,$telefone);

    if( $novaSenha ){
        $titulo     = 'Sucesso!';
        $msg        = 'A senha foi enviada ao e-mail cadastrado!';
        $icone      = 'sucess';
        $location   = '../index.php';

        $email = 'jorgin.silva@gmail.com';

        $conteudoEmail      = 'Nova senha para acessar o GERFIN - Gerenciador Financeiro';
        $mensagemEmail      = 'Sua nova senha de acesso é: <b>'.$novaSenha.'</b><br><br>Vale lembrar também que sua antiga senha já não funciona mais...';  
        $msgErro            = 'Não foi possível enviar a mensagem com a nova senha.<br> Erro: ';
        $msgSucesso         = 'Uma nova senha foi enviada ao email: '.$email.'!';

        require '../assets/util/enviaEmail.php';
        
    }else{
        $titulo     = 'Erro';
        $msg        = 'Os dados digitados não foram encontrados!!';
        $icone      = 'error';
        $location   = '../index.php';
        
    }
}else{
    $titulo     = 'Erro!';
    $msg        = 'Dados inválidos, retorno ao início';
    $icone      = 'error';
    $location   = '../index.php';
}

require '../assets/util/mensagemComum.php';

?>



