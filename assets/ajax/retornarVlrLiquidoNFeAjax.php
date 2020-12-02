<?php
    require '../../model/Recebimento.class.php';
    require '../../assets/util/conexaoDB.php';

    $r= new Recebimento;
    echo $r->retornarValorLiquidoNFe($_GET["numNFe"]);

?>