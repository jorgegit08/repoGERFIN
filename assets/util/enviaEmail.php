<?php
require '../assets/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'jorginenvioemailsmtp@gmail.com';
$mail->Password = 'Aaaa111!';

$mail->setFrom($mail->Username, "GERFIN");
$mail->addAddress($email);

$mail->isHTML(true);
$mail->Subject = $conteudoEmail;
$mail->Body    = $mensagemEmail;

if( !$mail->send() ) {

    $titulo     = 'Erro!';
    $msg        = $msgErro . $mail->ErrorInfo;
    $icone      = 'error';
    $location   = '../index.php';

} else {
    
    $titulo     = 'Sucesso!';
    $msg        = $msgSucesso;
    $icone      = 'success';
    $location   = '../index.php';
}

?>