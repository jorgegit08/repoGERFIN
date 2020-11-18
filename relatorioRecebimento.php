<html>
    <head>
        <meta charset="utf-8"/>
        <link href="css/style.css" rel="stylesheet">
	<title>Gerfin</title>>
        
    </head>
    <body>
        <h1 class="tit">Relatório de Recebimentos por Período</h1>
        <?php require 'menu.php';
            $dataInicial = date("Y-m-01");
			$dataFinal = date("Y-m-t");
        ?>

        <form id="filtroRelatorio" name="filtroRelatorio" method="POST" action="gerarRelatorioRecebimento.php" target="_blank">
            <div class="pesq margemBaixo30 pesqFiltro altura250 borda" align="center">
                <h2 class="margemBaixo30">Selecione o período do relatório</h2>
                <label for="datInicial" class="alinhaLabel">Data Inicial:</label>
                <input id="datInicial" name="datInicial" required="required" type="date" value="<?=$dataInicial?>" />
                
                <label for="datFinal" class="alinhaLabel">Data Final:</label>
                <input id="datFinal" name="datFinal" required="required" type="date" value="<?=$dataFinal?>" />
                <br>
                <label for="txtObservacao" class="alinhaLabel">Observação:</label>
                <input id="txtObservacao" name="txtObservacao" type="text" value="" />

                <div>
                    <button class="botaoCadastro" style="float: none" title="Buscar" onclick="submit()">Buscar</button>
                </div>
            </div>
        </form>  

    </body>

<html>  