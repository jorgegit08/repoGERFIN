<div>
	<!-- Biblioteca Jquery Mask -->
	<script type="text/javascript" src="/TCC/assets/jquery/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>

	<script language="javascript">
		$(document).ready(function(){
			//Coloca a máscara nos elementos que tiverem a classe abaixo
			$('.mascaraData').mask('00/00/0000');
			$('.mascaraHora').mask('00:00:00');
			$('.mascaraDataHora').mask('00/00/0000 00:00:00');
			$('.mascaraCep').mask('00000-000', {placeholder: "000000-000"});
			$('.mascaraDDDTelefone').mask('(00) 0000-00000', {placeholder: "(00) 0000-00000"});
			$('.mascaraDDDCelular').mask('(00) 0000-00000', {placeholder: "(00) 0000-00000"});
			$('.mascaraCPF').mask('000.000.000-00', {reverse: true});
			$('.mascaraCNPJ').mask('00.000.000/0000-00', {reverse: true});
			$('.mascaraValor').mask('000.000.000.000.000,00', {reverse: true});
			$('.mascaraValor2').mask("#.##0,00", {reverse: true});
			$('.mascaraPorcento').mask('##0,00%', {reverse: true});

			//Ao enviar o formulário (Submit) o sistema retira todas as máscara incluídas na tela
			$( "form" ).submit( function( event ) {
				$('.mascaraData').unmask();
				$('.mascaraHora').unmask();
				$('.mascaraDataHora').unmask();
				$('.mascaraCep').unmask();
				$('.mascaraDDDTelefone').unmask();
				$('.mascaraDDDCelular').unmask();
				$('.mascaraCPF').unmask();
				$('.mascaraCNPJ').unmask();
				//$('.mascaraValor').unmask();
				//$('.mascaraValor2').unmask();
				$('.mascaraPorcento').unmask();
			});
		});
	</script>
</div>

