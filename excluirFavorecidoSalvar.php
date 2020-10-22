<?php

require 'Favorecido.class.php';
require 'conexaoDB.php';

$f = new Favorecido();

if( isset($_POST['idFavorecido']) && !empty($_POST['idFavorecido']) ){
	$idFavorecido = $_POST['idFavorecido'];
    $f->excluirFavorecido($idFavorecido);

	echo"<script language='javascript' type='text/javascript'>
			alert('Favorecido excluído com sucesso!');
            window.location.href='consultarFavorecido.php';
		 </script>";
}else{

	echo"<script language='javascript' type='text/javascript'>
			alert('nenhum Favorecido foi excluído!');
		 </script>";
	
	header("Location: excluirFavorecido.php?idFavorecido=".$idFavorecido);
    }

    ?>



