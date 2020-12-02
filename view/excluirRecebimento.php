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
	
	<?php require 'menu.php';?>
		
	<h1 class="tit">Excluir Recebimento</h1> 

	<?php
		$r=new Recebimento;
		$r->consultarRecebimento($_GET['idRecebimento']);

		$c=new Cliente;
		$c->consultarCliente( $r->idCliente );
	?>
	
	<form method="post" action="../controller/excluirRecebimentoSalvar.php">	
		
		<div class="divPrincipalEdicao">
			<h2 class="h2Edicao">Dados do recebimento</h2> 

			<div> 
				<label for="txtCliente">Contrato:</label><br>
				<input id="txtCliente" name="txtCliente" disabled="disabled" type="text" value="<?=utf8_encode($c->txtRazaoSocial)?>" placeholder="Contrato"/> 
			</div> 

			<div> 
				<label for="txtContrato">Nº Contrato:</label><br>
				<input id="txtContrato" name="txtContrato" disabled="disabled" type="text" value="<?=$r->txtContrato?>" placeholder="Contrato"/> 
			</div>

			<div>
				<label for="txtGestor">Gestor:</label><br>
				<input id="txtGestor" name="txtGestor" disabled="disabled" type="text" value="<?=utf8_encode($r->txtGestor)?>" placeholder="Gestor"/> 
			</div>

			<div> 
				<label for="desctpRecebimento">Tipo do recebimento:</label><br>
				<input id="desctpRecebimento" name="desctpRecebimento" disabled="disabled"  type="text" value="<?=$r->desctpRecebimento?>" placeholder="Tipo de Recebimento" />
			</div>

			<div> 
				<label for="txtDescricao">Descrição:</label><br>
				<input id="txtDescricao" name="txtDescricao" disabled="disabled"  type="text" value="<?=utf8_encode($r->txtDescricao)?>" placeholder="Descrição" />
			</div>

			<div> 
				<label for="vlrBruto">Valor Bruto:</label><br>
				<input id="vlrBruto" name="vlrBruto" disabled="disabled"  type="text" value="<?=$r->vlrBruto?>" placeholder="1,000" />
			</div>

			<div> 
				<label for="vlrLiquido">Valor Líquido:</label><br>
				<input id="vlrLiquido" name="vlrLiquido" disabled="disabled"  type="text" value="<?=$r->vlrLiquido?>" placeholder="1,000" />
			</div>

			<div> 
				<label for="datEmissao">Data Emissão:</label><br>
				<input id="datEmissao" name="datEmissao" disabled="disabled" type="date" value="<?=$r->datEmissao?>"  placeholder="01/01/2020"/> 
			</div>

			<div> 
				<label for="datVencimento">Data Vencimento:</label><br>
				<input id="datVencimento" name="datVencimento" disabled="disabled" type="date" value="<?=$r->datVencimento?>"  placeholder="01/01/2020"/> 
			</div>

			<div> 
				<label for="datPagamento">Data de Pagamento:</label><br>
				<input id="datPagamento" name="datPagamento" type="date" disabled="disabled" value="<?=$r->datPagamento?>" placeholder="01/01/2020"/> 
			</div>

			<div> 
				<label for="numNFe">Nº NFe:</label><br>
				<input id="numNFe" name="numNFe" disabled="disabled" type="text" value="<?=$r->numNFe?>" placeholder="123"/>
			</div>

			<div> 
				<label for="indCancelado">Situação:</label><br>
				<input id="indCancelado" name="indCancelado" disabled="disabled" type="text" value="<?=$r->txtDescSituacao?>" placeholder="1,000" />
			</div>

			<div>
				<input  name="idRecebimento" type="hidden" value="<?=$_GET['idRecebimento']?>" />
				
				<div class="margemCima30"> 
					<input type="submit" id="btnExcluir" class="botaoCadastro" value="Excluir"/> 
				</div>
			</div>
		</div>
	</form>	
	
</body>
</html>