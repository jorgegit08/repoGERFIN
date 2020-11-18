	<!-- Biblioteca Jquery -->
	<script type="text/javascript" src="/TCC/assets/jquery/jQuery-3.3.1/jquery-3.3.1.js"></script>
	<!-- Funções do datatables -->
	<script type="text/javascript" src="/TCC/assets/jquery/DataTables-1.10.22/js/jquery.dataTables.min.js"></script>
	<!-- Css do datatable -->
	<link rel="stylesheet" type="text/css" href="/TCC/assets/jquery/DataTables-1.10.22/css/jquery.dataTables.min.css" />
	
	<script language="javascript">
	
		function exibirDataTable(tabela){
			
			//Padrão de quantidade de exibição ao carregar a página
			var pageLength = 10 ;
			
			if ( tabela.hasClass('registrosPagina10')) 		pageLength=10;
			if ( tabela.hasClass('registrosPagina20')) 		pageLength=20;
			if ( tabela.hasClass('registrosPagina50')) 		pageLength=50;
			if ( tabela.hasClass('registrosPaginaTodos')) 	pageLength=-1;
			
			
			//Busca o número de linhas de cabeçalho
			qtdLinhasTitulo = tabela.find( "thead tr" ).length;
			
			//Verifica se existe a tabela com a tag thead antes de transformar em datatable
			if(tabela.find( "thead tr" ).length < 1 ){
				return false;
			}	
			
			/*Se a tabela tiver apenas uma linha não aplica o datatable
			if( $(tabela).find( "tr" ).length - qtdLinhasTitulo <= 1 ){
				return false;
			}
			*/
			//Tabelas que possuem colspan para colocar uma linha acima da tabela precisam reduzir 1 a coluna para endereçar corretamente
			var idColunaOrdenacao 	= 0;
			var tipoOrdenacao 		= 'asc';
			var possuiColspan		= false ;
			var ordenaColunaZero 	= true;
			
			//Procura todos os tds que estão dentro de um thead tr
			$(tabela).find("thead tr td").each(function (index) {
				
				//Verifica se algum desses tds possui o colspan (Datatable não aceita Merge de colunas nem linhas)
				if( $(this).attr('colspan') > 1 ){
					possuiColspan = true;
				}
				
				//Verifica qual dos tds possui a classe asc ou desc para ordenar default por essa coluna
				if ( $(this).hasClass('asc') || $(this).hasClass('desc')){
					tipoOrdenacao 		= this.className;
					idColunaOrdenacao	= Number(index);
				}
				
				//Para todas as tabelas que possuem a primeira coluna para operação retira-se a opção de ordenar
				if ( $(this).hasClass('naoOrdenavel') ){
					ordenaColunaZero = false;
				}
				
			});    
			
			//Se encontrou a coluna com colspan então reduz em 1 a coluna de ordenação
			if( possuiColspan ){
				idColunaOrdenacao--;
				
				//Se por algum motivo esse número ficar negativo, assume-se zero
				if( idColunaOrdenacao < 0 ){
					idColunaOrdenacao = 0;
				}
			}
			
			//Comando para aplicar o dataTable na página chamadora
			$(tabela).DataTable({
				"pageLength": pageLength,
				"lengthMenu": [[10, 20 , 50, -1], [10, 20 , 50, "Todos"]],
				"scrollCollapse": true,
				"ordering": true,
				"searching": true,
				"order": [[ idColunaOrdenacao, tipoOrdenacao]],
				"columnDefs": [{ "targets": 0, "orderable": ordenaColunaZero, "searchable": ordenaColunaZero }],
				 "oLanguage": {
					"sProcessing":   "Processando...",
					"sLengthMenu":   "Mostrar _MENU_ registros",
					"sZeroRecords":  "Não foram encontrados resultados",
					"sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
					"sInfoEmpty":    "Mostrando de 0 até 0 de 0 registro(s)",
					"sInfoFiltered": "",
					"sInfoPostFix":  "",
					"sSearch":       "Filtrar:",
					"sUrl":          "",
					"oPaginate": {
						"sFirst":    "Primeiro",
						"sPrevious": "Anterior",
						"sNext":     "Seguinte",
						"sLast":     "Último"
					}
				}		

			})
			
			//Por padrão o datatable possui um linha abaixo da tabela que não fica boa com o layout do sigmas
			$(tabela).removeClass( "no-footer" );
		}
		
		function exibirDataTableResumido(tabela){

			//Comando para aplicar o dataTable Resumido na página chamadora
			$(tabela).DataTable({
				"scrollCollapse": false,
				"ordering": false,
				"searching": false,
				"paging": false,
				"info": false,				
				 "oLanguage": {
					"sProcessing":   "Processando...",
					"sLengthMenu":   "Mostrar _MENU_ registros",
					"sZeroRecords":  "Não foram encontrados resultados",
					"sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
					"sInfoEmpty":    "Mostrando de 0 até 0 de 0 registro(s)",
					"sInfoFiltered": "",
					"sInfoPostFix":  "",
					"sSearch":       "Filtrar:",
					"sUrl":          "",
					"oPaginate": {
						"sFirst":    "Primeiro",
						"sPrevious": "Anterior",
						"sNext":     "Seguinte",
						"sLast":     "Último"
					}
				}		

			})
			
			//Por padrão o datatable possui um linha abaixo da tabela que não fica boa com o layout do sigmas
			//$(tabela).removeClass( "no-footer" );
		}
		
		//Verifica se o Jquery foi de fato instanciado na aplicação
		if (typeof jQuery != 'undefined') {
			//Somente executa esse trecho após todo o carregamento da página
			$(document).ready(function() {
				
				//Procura pela classe abaixo na tabela para aplicar o datatable
				$( "#tblDataTable" ).each(function() {
					
					exibirDataTable( $( this ) );
					
				});
				
				//Caso não encontre a chamada normal de datatable, pode estar procurando pela chamada resumida
				$( ".tblDataTableResumido" ).each(function() {
					
					exibirDataTableResumido( $( this ) );
					
				});	

			});
		}
	
	</script>