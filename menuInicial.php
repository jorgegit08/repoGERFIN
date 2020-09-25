<?php

require 'conexaoDB.php';
require 'Usuario.class.php';

$u=new Usuario;

if( isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){


        $email= addslashes($_POST['email']);
        $senha= addslashes($_POST['senha']);

        if($u->login($email,$senha) == true){
                if( isset($_SESSION['email'])){
                        header("Location menuInicial.php");
                }else{
                        header("Location: index.php");
                }
        }else{
                echo"<script language='javascript' type='text/javascript'>
                alert('Login e/ou senha incorretos');window.location
                .href='index.php';</script>";
        }

}else{
        header("Location: index.php");
}


       

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="css/style.css" rel="stylesheet">
	<title>Menu</title>
</head>

<body>
	
	
		
	
        
		
	<nav class="menu" id="principal">
		<ul>
			<h1 align="center">GERFIN</h1>
			<li><a href="">Início</a></li>
			<li><a href="alterarUsuario.php">meus dados</a></li>
			<li><a href="consultarCliente.php">Cliente<span>+</span></a></i></li>
			<li><a href="#Contasapagar">Contas a pagar<span>+</span></a></li>
			<li><a href="#ContasaReceber">Contas a Receber<span>+</span></a></li>
			<li><a href="#Relatorios">Relatórios<span>+</span></a></li>
			<li><a href="#Agenda">Agenda <span>+</span></a></li>
		</ul>
	</nav>
		
	
	
	<nav class="menu" id="cliente">
		<ul>
			<li><a href="" class="voltar">Voltar</a></li>
			<li><a href="">Novo</a></li>
			<li><a href="">Consulta</a></li>
        </ul>
    </nav>

	<nav class="menu" id="Contasapagar">
		<ul>
			<li><a href="" class="voltar">Voltar</a></li>
			<li><a href="">Boletos</a></li>
			<li><a href="">Prolabore</a></li>
			<li><a href="">Salário</a></li>
			<li><a href="">Bolsas</a></li>
			<li><a href="">Distribuição de Lucros</a></li>
		</ul>
	</nav>


	<nav class="menu" id="ContasaReceber">
		<ul>
			<li><a href="" class="voltar">Voltar</a></li>
			<li><a href="">Honorários De Prolabore</a></li>
			<li><a href="">Honorários de Êxito</a></li>
		</ul>
	
	</nav>

	<nav class="menu" id="Relatorios">
		<ul>
			<li><a href="" class="voltar">Voltar</a></li>
			<li><a href="">Gastos Mensais</a></li>
			<li><a href="">Distribuições de Lucro</a></li>
			<li><a href="">Notas Fiscais</a></li>
		</ul>
	</nav>

	<nav class="menu" id="Agenda">
		<ul>
			<li><a href="" class="voltar">Voltar</a></li>
			<li><a href="">Marcadores Mensais</a></li>
		</ul>
	</nav>
	

</body>
</html>