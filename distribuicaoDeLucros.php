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
	<title>Menu</title>
</head>

<body>
	
	<script language="javascript">
        $(document).ready(function(){
			
			$("#numNFe").on( 'blur', function(){
			
			
				$.ajax({
					type:'GET',
					url:'retornarVlrLiquidoNFeAjax.php?numNFe=' + $('#numNFe').val(),
					dataType: 'html',
					cache: false,
					contentType: "text/html;charset=utf-8",
					scriptCharset: "utf-8",
					success:function(resultadoAjax){
						$('#vlrLiquido').val( resultadoAjax );
						alert(resultadoAjax);
					}
				});
			});
			
		});
		function calculaPercent(idFavorecido){
				if($("#vlrLiquido").val() == "" || $("#vlrLiquido").val() == 0){
					alert('Valor liquido da NFe não foi preenchido!')
					
					return false;
				};

				
				eval('document.getElementById("vlrPercent"+idFavorecido).value = document.getElementById("percent"+idFavorecido).value / 100 * document.getElementById("vlrLiquido").value'); 
			};
		
	</script>	

	<h1 class="tit">Distribuição de lucros</h1>
	<?php require 'menu.php';?>
	
	<div style="display: flex; margin-left: 270px;">
		<input type="text" id='numNFe' name='numNFe' placeholder='numNFe' >
        <input type="text" id='vlrLiquido' name='vlrLiquido' placeholder='Valor Liquido' >
	</div>
	
	<div class="pesq" style="background-color: #fff; width: 100%">
		
		<form action="distribuicaoDeLucrosSalvar.php">
			<table id="tblDataTable" class="display" style="width:100%">
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

						echo "<td>".$registroAtual['txtNome']." <input type='hidden' name='txtNome' value='".$registroAtual['txtNome']."'></td>";
						echo "<td> <input type='number' name='percent' id='percent".$registroAtual['idFavorecido']."' placeholder='0%' onblur='calculaPercent(".$registroAtual['idFavorecido'].")'> </td>";
						echo "<td> <input type='number' name='vlrPercent' id='vlrPercent".$registroAtual['idFavorecido']."' placeholder='100,00'> </td>";
						echo "<td> <input type='date' name='data' id='data".$registroAtual['idFavorecido']."'> </td>";
						echo "<td> <input type='file' name='comprovante' id='comprovante".$registroAtual['idFavorecido']."'> </td>";

						echo "</tr>";
					}
				?>
				</tbody>	
			</table>
		</form>
	</div>

</body>
</html>