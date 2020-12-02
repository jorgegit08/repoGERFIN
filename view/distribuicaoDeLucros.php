<?php
require '../assets/util/conexaoDB.php';
require '../model/Cliente.class.php';
require '../model/Favorecido.class.php';
require '../assets/dataTable/dataTable.js';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link href='../css/style.css' rel='stylesheet'>
	<link href='../css/styleEdicao.css' rel='stylesheet'>
	<script src='/TCC/assets/jquery/sweetalert2/sweetalert2.js'></script>
	<title>Gerfin</title>
</head>

<body>
	
	<script language="javascript">
        $(document).ready(function(){
			
			$("#numNFe").on( 'change', function(){
			
				$.ajax({
					type:'GET',
					url:'../assets/ajax/retornarVlrLiquidoNFeAjax.php?numNFe=' + $('#numNFe').val(),
					dataType: 'text',
					cache: false,
					contentType: "text/html;charset=utf-8",
					scriptCharset: "utf-8",
					success:function(resultadoAjax){
						
						//Verifica se o resultado é numerico ou texto, se for texto é a mensagem de erro
						if( ! $.isNumeric( resultadoAjax.replace(",",".") ) ){
							//Apresenta o erro
							Swal.fire({
								title: 				'Erro',
								text: 				resultadoAjax,
								icon: 				'error',
								confirmButtonText: 	'Ok'
							});

							//Apaga o campo do valor líquido
							$('#vlrLiquido').val("");

							//Limpa os campos já digitados na tabela
							limparCampos();

							//Bloqueia ou desbloqueia a tabela
							bloqueiaDesbloqueiaTabela();
						}else{
							
							//Biblioteca Sweetalert2 para exibir efeito melhorado de aviso
							const Toast = Swal.mixin({
								toast: 				true,
								position: 			'top-right',
								showConfirmButton: 	false,
								timer: 				3000,
								timerProgressBar: 	true,
								didOpen: (toast) => {
									toast.addEventListener('mouseenter', Swal.stopTimer)
									toast.addEventListener('mouseleave', Swal.resumeTimer)
								}
							})

							Toast.fire({
								icon: 	'success',
								title: 	'Valor importado com sucesso'
							})
							
							//Seta o campo de valor líquido com obtido através da NFe ainda não distribuída
							$('#vlrLiquido').val( parseFloat( resultadoAjax.replace(",",".") ).toFixed(2).replace(".",",") );

							//Limpa os campos já digitados na tabela
							limparCampos();

							//Bloqueia ou desbloqueia a tabela
							bloqueiaDesbloqueiaTabela();
						}
						
					}
				});
				
			});
			
			//Bloqueia tabela e botao cadastrar caso não tenha valor líquido preenchido
			$("#vlrLiquido").on( 'change', function(){
				bloqueiaDesbloqueiaTabela();
			});

			bloqueiaDesbloqueiaTabela();
			
			//Seta o tamanho da div onde fica o botao cadastrar para o mesmo tamanho da tabela
			$("#divBtnDistrLucro").width( $("#tblDistrLucro").width() );
	
		});

		function bloqueiaDesbloqueiaTabela(){
			if( $("#vlrLiquido").val() == "" ){
				$(".tblDataTableResumido").find("input,button,submit").prop("disabled", true);
				$(".botaoCadastro").prop("disabled", true);
			}else{
				$(".tblDataTableResumido").find("input,button,submit").prop("disabled", false);
				$(".botaoCadastro").prop("disabled", false);
			}
		}
		
		//Calcula o valor percentual a partir do valor líquido
		function calculaPercent(idFavorecido){
				if($("#vlrLiquido").val() == "" || $("#vlrLiquido").val() == 0){
					alert('Valor liquido da NFe não foi preenchido!');
					return false;
				};
				
				percent = eval('document.getElementById("percent"+idFavorecido)');
				vlrPercent = eval('document.getElementById("vlrPercent"+idFavorecido)');
				vlrLiquido = document.getElementById("vlrLiquido").value.replace(",",".");
				
				vlrPercent.value = (percent.value / 100 * vlrLiquido).toFixed(2).replace(".",",");

		}
		
		//Função para avaliar dados antes de enviar o formulário
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
			//Maneira para acessar todos os inputs de tag name que começa com 'percent' por isso 'name^='
			$("input[name^='percent'").val("");
			$("input[name^='vlrPercent'").val("");
			$("input[name^='comprovante'").val("");
		}

		function mensagemVlrLiquido(){
			alert("O valor líquido deve ser fornecido através da NF-e!");
		}
	</script>	

	<h1 class="tit">Distribuição de lucros</h1>
		
	<?php 	require 'menu.php';
			require '../assets/jquery/jQuery-Mask-Plugin-master/jQueryMascara.php';
	?>
		
	<form action="../controller/distribuicaoDeLucrosSalvar.php" id="formDistrLucro" name="formDistrLucro" method="POST" enctype="multipart/form-data">	
		<div class="pesq pesqFiltro altura250 tamanho400 borda">
			
			<div style="margin-bottom: 50px">
				<h2 class="h2Edicao">Dados da NF-e</h2> 
				<label for="idCliente">NF-e nº: </label>
				<input type="text" id='numNFe' name='numNFe' required="required" placeholder='123'" >

				<label for="idCliente">Valor Líquido: </label>
				<input type="text" id='vlrLiquido' name='vlrLiquido' required="required" class='mascaraValor2 proibido' placeholder='100,00' readonly="readonly" onclick="mensagemVlrLiquido()" >
			</div>

			<fieldset>
				<table id="tblDistrLucro" class="tblDataTableResumido stripe" class="display" style="width:100%">
					<thead style="font-weight: bold">
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
							echo "<td> <input type='text' name='percent[]' maxlength='3' class='perc' id='percent".$registroAtual['idFavorecido']."' placeholder='0%' onblur='calculaPercent(".$registroAtual['idFavorecido'].")'> </td>";
							echo "<td> <input type='text' class='mascaraValor2 proibido' readonly='readonly' name='vlrPercent[]' id='vlrPercent".$registroAtual['idFavorecido']."' placeholder='100,00'> </td>";
							echo "<td> <input type='date' name='data[]' value='".date('Y-m-d')."' id='data".$registroAtual['idFavorecido']."'> </td>";
							echo "<td> <input type='file' name='comprovante[]' id='comprovante".$registroAtual['idFavorecido']."'> </td>";

							echo "</tr>";
						}
					?>
					</tbody>	
				</table>
			</fieldset>

			<div id="divBtnDistrLucro" class="margemCima30"> 
				<input type="button" class="botaoCadastro" value="Cadastrar" onclick="cadastrarDistrLucro()"/> 
			</div>
		
		</div>
	</form>
</body>
</html>