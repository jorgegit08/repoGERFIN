<?php

require 'conexaoDB.php';
require 'Usuario.class.php';

$u=new Usuario;

if( isset($_POST['txtEmail']) && !empty($_POST['txtEmail']) && isset($_POST['txtSenha']) && !empty($_POST['txtSenha'])){

	$txtEmail= addslashes($_POST['txtEmail']);
	$txtSenha= addslashes($_POST['txtSenha']);

	if($u->login($txtEmail,$txtSenha) == true){

		if( isset($_SESSION['txtEmail'])){
			header("Location menuInicial.php");
		}else{
			header("Location: index.php");
		}
	}else{
		echo"<script language='javascript' type='text/javascript'>
				alert('Login e/ou senha incorretos');
				window.location.href='index.php';
			 </script>";
	}

}else{
	header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="css/style.css" rel="stylesheet">
	<title>Gerfin</title>
</head>

<body>      
	<?php require 'menu.php';?>
	
</body>
</html>