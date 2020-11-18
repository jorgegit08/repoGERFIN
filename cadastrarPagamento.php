<?php
require 'Pagamento.class.php';
require 'conexaoDB.php';
require 'TipoPagamento.class.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="css/style.css" rel="stylesheet">
	<link href="css/styleEdicao.css" rel="stylesheet">
	<title>Gerfin</title>
</head>

<body>
	
	<script type="text/javascript" src="/TCC/assets/jquery/jQuery-3.3.1/jquery-3.3.1.js"></script>
		
	<?php 	require 'menu.php';
			require 'assets/jquery/jQuery-Mask-Plugin-master/jQueryMascara.php';
	?>
		
	<h1 class="tit">Cadastrar Pagamento</h1> 
	
	<form method="post" action="cadastrarPagamentoSalvar.php"> 	
		
		<div class="pesq pesqFiltro tamanho400  altura100percent borda">
			<h2 class="margemBaixo30 alinhaTextoCentro tamanho400 margemCima10">Dados do pagamento</h2> 

			<div> 
				<label for="txtDescricao">Descrição do pagamento:</label><br>
				<input id="txtDescricao" name="txtDescricao" required="required"  type="text" placeholder="Descrição" />
			</div>

			<div> 
				<label for="txtDescricao">Tipo do pagamento:</label><br>
				<?php
				
					$tp= new TipoPagamento;

					echo "<select name='idTipoPagamento' class='selInfo'>";
					
					foreach($tp->listarTiposPagamento() as $registroAtual){
						
						
						echo "<option value=".$registroAtual['idTipoPagamento']. " ".$selected.">".$registroAtual['txtDescricao']."</option>";
						
					}
					echo "</select>";
					?>
			</div>

			<div> 
				<label for="datVencimento">Data vencimento:</label><br>
				<input id="datVencimento" name="datVencimento" required="required" type="date"  placeholder="01/01/2020"/> 
			</div>

			<div> 
				<label for="datPagamento">Data de pagamento:</label><br>
				<input id="datPagamento" name="datPagamento"  type="date"  placeholder="01/01/2020"/> 
			</div>

			<div> 
				<label for="vlrValor">Valor:</label><br>
				<input id="vlrValor" name="vlrValor" required="required" class="mascaraValor2" type="text" placeholder="100"/>
			</div>

			<div class="margemCima30"> 
			  <input class="botaoCadastro" type="submit" value="Cadastrar"/> 
			</div>
	</div>
	
</body>
</html>