<?php
require 'conexaoDB.php';
require 'Cliente.class.php';
require 'Favorecido.class.php';
require 'assets/dataTable/dataTable.js';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href="css/style.css" rel="stylesheet">
	<title>Gerfin</title>
</head>

<body>
	
	<script language="javascript">
        $(document).ready(function(){
			
			$("#numNFe").on( 'change', function(){
			
				$.ajax({
					type:'GET',
					url:'retornarVlrLiquidoNFeAjax.php?numNFe=' + $('#numNFe').val(),
					dataType: 'html',
					cache: false,
					contentType: "text/html;charset=utf-8",
					scriptCharset: "utf-8",
					success:function(resultadoAjax){
						$('#vlrLiquido').val( resultadoAjax );
						limparCampos();
					}
				});
			});
			
		});
		
		function calculaPercent(idFavorecido){
				if($("#vlrLiquido").val() == "" || $("#vlrLiquido").val() == 0){
					alert('Valor liquido da NFe não foi preenchido!');
					return false;
				};
				
				percent = eval('document.getElementById("percent"+idFavorecido)');
				vlrPercent = eval('document.getElementById("vlrPercent"+idFavorecido)');
				vlrLiquido = document.getElementById("vlrLiquido").value.replace(",",".");
				
				vlrPercent.value = (percent.value / 100 * vlrLiquido).toFixed(2);

		}
		
		function cadastrarDistrLucro(){
			somaPercent = 0;

			$(".perc").each( function(){
				//Colocado *1 ao final para converter para número
				somaPercent += $(this).val() * 1;
			});
			
			if( somaPercent != 100 ){
				alert("A soma das porcentagens precisa ser 100, o valor atual é: " + somaPercent + "!");
				return false;
			}
			
			document.getElementById("formDistrLucro").submit();
		}
		
		function limparCampos(){
			$("input[name^='percent'").val("");
			$("input[name^='vlrPercent'").val("");
			$("input[name^='comprovante'").val("");
		}
	</script>	

	<h1 class="tit">Distribuição de lucros</h1>
	<?php require 'menu.php';?>
		
	<div class="pesq" style="background-color: #fff; width: 100%">
		
		<form action="distribuicaoDeLucrosSalvar.php" id="formDistrLucro" name="formDistrLucro" method="POST" enctype="multipart/form-data">
			<div>
				<input type="text" id='numNFe' name='numNFe' required="required" placeholder='numNFe' >
				<input type="text" id='vlrLiquido' name='vlrLiquido' required="required" placeholder='Valor Liquido' >
			</div>
			<br>
			<br>
			<table id="tblDataTableResumido" class="display" style="width:100%">
				<thead>
				<TR>
					<td>Favorecido</td>
					<td>Porcentagem</td>
					<td>Valor</td>
					<td>Data</td>
					<td>Comprovante</td>
				</TR>
				</thead>
				<tbody>

				<?php
					$f= new Favorecido;
					
					foreach($f->listarFavorecidos() as $registroAtual){
						echo "<tr>";

						echo "<td>".
								utf8_encode($registroAtual['txtNome'])." 
								<input type='hidden' name='txtNome[]' value='".$registroAtual['txtNome']."'>
								<input type='hidden' name='idFavorecido[]' value='".$registroAtual['idFavorecido']."'>
							  </td>";
						echo "<td> <input type='number' name='percent[]' maxlength='3' class='perc' id='percent".$registroAtual['idFavorecido']."' placeholder='0%' onblur='calculaPercent(".$registroAtual['idFavorecido'].")'> </td>";
						echo "<td> <input type='number' name='vlrPercent[]' id='vlrPercent".$registroAtual['idFavorecido']."' placeholder='100,00'> </td>";
						echo "<td> <input type='date' name='data[]' value='".date('Y-m-d')."' id='data".$registroAtual['idFavorecido']."'> </td>";
						echo "<td> <input type='file' name='comprovante[]' id='comprovante".$registroAtual['idFavorecido']."'> </td>";

						echo "</tr>";
					}
				?>
				</tbody>	
			</table>
			
			<p align="center"> 
				<input style="width: 150px" type="button" value="Cadastrar" onclick="cadastrarDistrLucro()"/> 
			</p>
		</form>
	</div>

</body>
</html>