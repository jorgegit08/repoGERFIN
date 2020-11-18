<?php
require 'Recebimento.class.php';
require 'conexaoDB.php';
require 'TipoRecebimento.class.php';
require 'Cliente.class.php';
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
		
	<h1 class="tit">Cadastrar Recebimento</h1> 
	
	<form method="post" action="cadastrarRecebimentoSalvar.php">		
		
		<div class="pesq pesqFiltro tamanho400 altura100percent borda">
			<h2 class="margemBaixo30 alinhaTextoCentro tamanho400 margemCima10">Dados do recebimento</h2> 

			<div> 
				<label for="numNFe">Nº NFe:</label><br>
				<input id="numNFe" name="numNFe" required="required" type="text" placeholder="123"/>
			</div>

			<div> 
				<label for="idCliente">Cliente:</label><br>
				<?php
					
					$c= new Cliente;

					echo "<select name='idCliente' class='selInfo'>";
					
					foreach($c->listarClientes() as $registroAtual){
						
						echo "<option value=".$registroAtual['idCliente']. " ".$selected.">".$registroAtual['txtRazaoSocial']."</option>";
						
					}
					echo "</select>";
					?>
			</div> 

			<div> 
				<label for="txtContrato">Contrato:</label><br>
				<input id="txtContrato" name="txtContrato" required="required" type="text"  placeholder="Contrato"/> 
			</div>

			<div> 
				<label for="txtGestor">Gestor:</label><br>
				<input id="txtGestor" name="txtGestor" required="required" type="text"  placeholder="Gestor"/> 
			</div>

			<div> 
				<label for="idTipoRecebimento">Tipo de Recebimento:</label><br>
				<?php
					
					$tr= new TipoRecebimento;

					echo "<select name='idTipoRecebimento' class='selInfo'>";
					
					foreach($tr->listarTiposRecebimento() as $registroAtual){
						
						
						echo "<option value=".$registroAtual['idTipoRecebimento']. " ".$selected.">".$registroAtual['txtDescricao']."</option>";
						
					}
					echo "</select>";
				?>
			</div>

			<div> 
				<label for="txtDescricao">Descrição:</label><br>
				<input id="txtDescricao" name="txtDescricao" required="required" type="text" placeholder="Descrição" />
			</div>

			<div> 
				<label for="vlrBruto">Valor Bruto:</label><br>
				<input id="vlrBruto" name="vlrBruto" class="mascaraValor2" required="required" type="text" placeholder="1,000" />
			</div>

			<div> 
				<label for="vlrLiquido">Valor Líquido:</label><br>
				<input id="vlrLiquido" name="vlrLiquido" class="mascaraValor2" required="required" type="text" placeholder="1,000" />
			</div>

			<div> 
				<label for="datEmissao">Data Emissão:</label><br>
				<input id="datEmissao" name="datEmissao" required="required" type="date" placeholder="01/01/2020"/> 
			</div>

			<div> 
				<label for="datVencimento">Data Vencimento:</label><br>
				<input id="datVencimento" name="datVencimento" required="required" type="date" placeholder="01/01/2020"/> 
			</div>

			<div> 
				<label for="datPagamento">Data de Pagamento:</label><br>
				<input id="datPagamento" name="datPagamento"  type="date" placeholder="01/01/2020"/> 
			</div>

			<div> 
				<label for="indCancelado">Situação:</label><br>
				<select id="indCancelado" name='indCancelado' class="selInfo">
					<option value="0">Ativo</option>
					<option value="1">Cancelado</option>
				</select>
			</div>

			<div class="margemCima30"> 
				<input type="submit" class="botaoCadastro" value="Cadastrar"/> 
			</div>
		</div>
	</form>
	
</body>
</html>