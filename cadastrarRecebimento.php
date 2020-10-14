<?php
require 'Recebimento.class.php';
require 'conexaoDB.php';
require 'TipoRecebimento.class.php';
require 'Cliente.class.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="assets/css/style.css" rel="stylesheet">
	<title>Menu</title>
</head>

<body>
	
	<?php require 'menu.php';?>
		
	<h1 class="tit">Cadastrar Recebimento</h1> 
		
	<div class="cadastro">
	

		<form method="post" action="cadastrarRecebimentoSalvar.php">

			<p> 
			<label for="idCliente">Cliente:</label><br>
			<?php
				
				$c= new Cliente;

				echo "<select name='idCliente'>";
				
				foreach($c->listarClientes() as $registroAtual){
					
					
					echo "<option value=".$registroAtual['idCliente']. " ".$selected.">".$registroAtual['txtRazaoSocial']."</option>";
					
				}
				echo "</select>";
				?>
				<br>
			</p> 
			<p> 
				<br>
				<label for="txtContrato">Contrato:</label><br>
				<input id="txtContrato" name="txtContrato" required="required" type="text"  placeholder="Contrato"/> 
			</p>
			<p> 
				<br>
				<label for="txtGestor">Gestor:</label><br>
				<input id="txtGestor" name="txtGestor" required="required" type="text"  placeholder="Gestor"/> 
			</p>
			<p> 
			<label for="idTipoRecebimento">Descrição:</label><br>
			<?php
				
				$tr= new TipoRecebimento;

				echo "<select name='idTipoRecebimento'>";
				
				foreach($tr->listarTiposRecebimento() as $registroAtual){
					
					
					echo "<option value=".$registroAtual['idTipoRecebimento']. " ".$selected.">".$registroAtual['txtDescricao']."</option>";
					
				}
				echo "</select>";
				?>
				<br>
			</p>
			<p> 
				<label for="txtDescricao">Descrição:</label><br>
				<input id="txtDescricao" name="txtDescricao" required="required"  type="text" placeholder="Descrição" />
			</p>
			<p> 
				<label for="vlrBruto">Valor Bruto:</label><br>
				<input id="vlrBruto" name="vlrBruto" required="required"  type="text" placeholder="1,000" />
			</p>
			<p> 
				<label for="vlrLiquido">Valor Líquido:</label><br>
				<input id="vlrLiquido" name="vlrLiquido" required="required"  type="text" placeholder="1,000" />
			</p>
			<p> 
				<br>
				<label for="datVencimento">Data Vencimento:</label><br>
				<input id="datVencimento" name="datVencimento" required="required" type="date"  placeholder="01/01/2020"/> 
			</p>
			<p> 
				<label for="datPagamento">Data de Pagamento:</label><br>
				<input id="datPagamento" name="datPagamento"  type="date"  placeholder="01/01/2020"/> 
			</p>
			<p> 
				<label for="numNFe">Nº NFe:</label><br>
				<input id="numNFe" name="numNFe" required="required"  type="text" placeholder="123"/>
			</p>

			<p> 
			  <input  type="submit" value="Cadastrar"/> 
			</p>
	</div>
	
</body>
</html>