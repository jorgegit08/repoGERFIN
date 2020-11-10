<?php
    require 'Recebimento.class.php';
    require 'conexaoDB.php';

    $r= new Recebimento;
    echo $r->retornarValorLiquidoNFe($_GET["numNFe"]);

?>