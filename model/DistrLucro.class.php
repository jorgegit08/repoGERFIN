<?php

 class DistrLucro{	
	
    public $idDistrLucro="";
    public $idFavorecido="";
    public $idPagamento="";
    public $numPercentual="";
    public $vlrValor="";
    public $datPagamento="";
    public $imgComprovante="";

    public function cadastrarDistrLucro($idFavorecido,$idPagamento,$numPercentual,$vlrValor,$datPagamento,$imgComprovante,$numNFe){
        global $pdo;
			        
            $sql ="INSERT into distrlucro (idFavorecido,idPagamento,numPercentual,vlrValor,datPagamento,imgComprovante,numNFe) VALUES (:idFavorecido,:idPagamento,:numPercentual,:vlrValor,:datPagamento,:imgComprovante,:numNFe)";
            $sql =$pdo->prepare($sql);
            $sql->bindValue("idFavorecido",$idFavorecido);
            $sql->bindValue("idPagamento",$idPagamento);
            $sql->bindValue("numPercentual",$numPercentual);
            $sql->bindValue("vlrValor",str_replace(',','.', str_replace('.','', $vlrValor)));
            $sql->bindValue("datPagamento",implode('-', array_reverse(explode('/',$datPagamento))));
            $sql->bindValue("imgComprovante",$imgComprovante);
            $sql->bindValue("numNFe",$numNFe);
            $sql->execute();
    }

}
