<html>
    <head>
        <meta charset="utf-8"/>
        <link href="css/style.css" rel="stylesheet">
	<title>Gerfin</title>>
        
    </head>
    <body>
        <h1 class="tit">Relatórios</h1>
        <?php require 'menu.php';?>
        <div class="pesq" style="background-color: #fff; width: 100%">
            <form action="gerarPDF.php" method="Post">
                <p> 
                    <br>
                    <label for="datinicial">Data inicial:</label><br>
                    <input id="datInicial" name="datInicial" required="required" type="date"  placeholder="01/01/2020"/> 
                </p>
                <p> 
                    <label for="datFinal">Data final:</label><br>
                    <input id="datFinal" name="datFinal"  type="date"  placeholder="01/01/2020"/> 
                </p>
                <p> 
			        <input  type="submit" value="buscar" style="width:100px"/> 
			    </p>

            </form>
        </div>   

    </body>

<html>  