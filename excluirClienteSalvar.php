<?php

require 'Cliente.class.php';
require 'conexaoDB.php';

$c = new Cliente();

if( isset($_POST['idCliente']) && !empty($_POST['idCliente']) ){
	$idCliente = $_POST['idCliente'];
    $c->excluirCliente($idCliente);

	echo"<script language='javascript' type='text/javascript'>
			alert('Cliente excluído com sucesso!');
            window.location.href='consultarCliente.php';
		 </script>";
}else{

	echo"<script language='javascript' type='text/javascript'>
			alert('nenhum cliente foi excluído!');
		 </script>";
	
	header("Location: excluirCliente.php?idCliente=".$idCliente);
    }

    ?>



