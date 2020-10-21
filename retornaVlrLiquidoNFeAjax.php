<?php
    require 'Recebimento.class.php';

    $r= new Recebimento;
    echo $r->retornarValorLiquidoNFe($_GET["numNFe"]);

?>