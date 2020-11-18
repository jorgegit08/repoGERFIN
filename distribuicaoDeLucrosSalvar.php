<?php

require 'Pagamento.class.php';
require 'DistrLucro.class.php';
require 'conexaoDB.php';

$pg = new Pagamento();
$dl = new DistrLucro();

//Tipo Pagamento 6 é a distribuição de Lucro
$idTipoPagamento = 6;

if(isset($_POST['txtNome']) && !empty($_POST['txtNome'])
    &&    isset($_POST['vlrPercent']) && !empty($_POST['vlrPercent'])
    &&    isset($_POST['data']) && !empty($_POST['data'])
	
	&&    isset($_POST['numNFe']) && !empty($_POST['numNFe'])
	&&    isset($_POST['vlrLiquido']) && !empty($_POST['vlrLiquido'])
	&&    isset($_POST['percent']) && !empty($_POST['data'])){
		
	foreach ($_POST['percent'] as $i => $RegistroAtual) {
		
		if(!empty($RegistroAtual)){
		
			$txtDescricao = addslashes($_POST['txtNome'][$i]);
			$vlrPercent = addslashes($_POST['vlrPercent'][$i]);
			$data = addslashes($_POST['data'][$i]);
			$numPercentual = addslashes($RegistroAtual);
			$vlrLiquido = addslashes($_POST['vlrLiquido']);
			$numNFe = addslashes($_POST['numNFe']);
			$idFavorecido = addslashes($_POST['idFavorecido'][$i]);

			if($vlrPercent != "" && $vlrPercent > 0){
				$idPagamento = $pg->cadastrarPagamento($idTipoPagamento,$txtDescricao,$data,$data,$vlrPercent);          
			}
			
			if($_FILES["comprovante"]["tmp_name"][$i] != ""){
				//tmp_name é um nome temporário gerado pelo sistema
				$file_tmp = $_FILES["comprovante"]["tmp_name"][$i];
				
				//lemos o conteudo do arquivo usando afunção do PHP  file_get_contents
				$imgComprovante = file_get_contents($file_tmp);
				
			}else{
				$imgComprovante = '';
			}
				
			if($vlrPercent != "" && $vlrPercent > 0){
				$dl->cadastrarDistrLucro($idFavorecido,$idPagamento,$numPercentual,$vlrPercent,$data,$imgComprovante,$numNFe); 
			}
		}
	}
	
	echo	"<script language='javascript' type='text/javascript'>
				alert('Dados da distribuição de lucro cadastrados !');
				window.location.href='consultarPagamento.php';
			</script>";
}else{
   
	echo	"<script language='javascript' type='text/javascript'>
				alert('nenhum dado foi cadastrado!');
				window.location.href=history.back();
			</script>";
}


echo	"<script language='javascript' type='text/javascript'>
				alert('Dados da distribuição de lucro cadastrados !');
				window.location.href='consultarPagamento.php';
			</script>";
?>



