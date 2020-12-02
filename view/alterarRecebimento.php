<?php
require '../model/Recebimento.class.php';
require '../assets/util/conexaoDB.php';
require '../model/TipoRecebimento.class.php';
require '../model/Cliente.class.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="../css/style.css" rel="stylesheet">
	<link href="../css/styleEdicao.css" rel="stylesheet">
	<title>Gerfin</title>
</head>

<body>
	
	<script type="text/javascript" src="/TCC/assets/jquery/jQuery-3.3.1/jquery-3.3.1.js"></script>
		
	<?php 	require 'menu.php';
			require '../assets/jquery/jQuery-Mask-Plugin-master/jQueryMascara.php';
	?>
		
	<h1 class="tit">Alterar Recebimento</h1> 

	<?php
		$r=new Recebimento;
		$r->consultarRecebimento($_GET['idRecebimento']);
	?>
	
	<form method="post" action="../controller/alterarRecebimentoSalvar.php">	
		
		<div class="divPrincipalEdicao">
			<h2 class="h2Edicao">Dados do recebimento</h2> 

			<div> 
				<label for="numNFe">Nº NFe:</label><br>
				<input id="numNFe" name="numNFe" required="required"  type="text" value="<?=$r->numNFe?>" placeholder="123"/>
			</div>

			<div> 
				<label for="idCliente">Cliente:</label><br>
				<?php
					
					$c= new Cliente;

					echo "<select name='idCliente' class='selInfo'>";
					
					foreach($c->listarClientes() as $registroAtual){
						
						if($registroAtual['idCliente']==$_GET['idCliente']){
							$selected = "selected";
						}else{
							$selected ="";
						}
						echo "<option value=".$registroAtual['idCliente']. " ".$selected.">".utf8_encode( $registroAtual['txtRazaoSocial'] )."</option>";
						
					}
					echo "</select>";
				?>
			</div> 

			<div> 
				<label for="txtContrato">Nº Contrato:</label><br>
				<input id="txtContrato" name="txtContrato" required="required" type="text" value="<?=$r->txtContrato?>" placeholder="Contrato"/> 
			</div>

			<div>
				<label for="txtGestor">Gestor:</label><br>
				<input id="txtGestor" name="txtGestor" required="required" type="text" value="<?=utf8_encode( $r->txtGestor )?>" placeholder="Gestor"/> 
			</div>

			<div> 
				<label for="idTipoRecebimento">Descrição:</label><br>
				<?php
					
					$tr= new TipoRecebimento;

					echo "<select name='idTipoRecebimento' class='selInfo'>";
					
					foreach($tr->listarTiposRecebimento() as $registroAtual){
						
						if($registroAtual['idTipoRecebimento']==$_GET['idTipoRecebimento']){
							$selected = "selected";
						}else{
							$selected ="";
						}
						echo "<option value=".$registroAtual['idTipoRecebimento']. " ".$selected.">".utf8_encode( $registroAtual['txtDescricao'] )."</option>";
						
					}
					echo "</select>";
				?>
			</div>

			<div> 
				<label for="txtDescricao">Descrição:</label><br>
				<input id="txtDescricao" name="txtDescricao" required="required"  type="text" value="<?=utf8_encode( $r->txtDescricao )?>" placeholder="Descrição" />
			</div>

			<div> 
				<label for="vlrBruto">Valor Bruto:</label><br>
				<input id="vlrBruto" name="vlrBruto" class="mascaraValor2" required="required"  type="text" value="<?=$r->vlrBruto?>" placeholder="1,000" />
			</div>

			<div> 
				<label for="vlrLiquido">Valor Líquido:</label><br>
				<input id="vlrLiquido" name="vlrLiquido" class="mascaraValor2" required="required"  type="text" value="<?=$r->vlrLiquido?>" placeholder="1,000" />
			</div>

			<div> 
				<label for="datEmissao">Data Emissão:</label><br>
				<input id="datEmissao" name="datEmissao" required="required" type="date" value="<?=$r->datEmissao?>"  placeholder="01/01/2020"/> 
			</div>

			<div> 
				<label for="datVencimento">Data Vencimento:</label><br>
				<input id="datVencimento" name="datVencimento" required="required" type="date" value="<?=$r->datVencimento?>"  placeholder="01/01/2020"/> 
			</div>

			<div> 
				<label for="datPagamento">Data de Pagamento:</label><br>
				<input id="datPagamento" name="datPagamento"  type="date" value="<?=$r->datPagamento?>" placeholder="01/01/2020"/> 
			</div>

			<div> 
				<label for="indCancelado">Situação:</label><br>
				<select id="indCancelado" name='indCancelado' class="selInfo">
				<?php		
					if($registroAtual['indCancelado']==0){
							$selected = "selected";
						}else{
							$selected ="";
						}
					?>
					<option value="0">Ativo</option>
					<option value="1" <?=$selected?>>Cancelado</option>
				</select>
			</div>

			<div>
				<input  name="idRecebimento" type="hidden" value="<?=$_GET['idRecebimento']?>" />
				
				<div class="margemCima30"> 
					<input type="submit" class="botaoCadastro" value="Alterar"/> 
				</div>
			</div>
	</div>
	
</body>
</html>