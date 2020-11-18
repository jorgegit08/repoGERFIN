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
	
    /*public function alterarCliente($idCliente,$txtCNPJ,$txtContatoDireto,$txtEmail,$txtEndereco,$txtInscricaoEstadual,$txtRazaoSocial,$txtTelefone){
        global $pdo;
        
		$this->consultarCliente($idCliente);

        $sql ="UPDATE cliente SET txtCNPJ=:txtCNPJ,txtContatoDireto=:txtContatoDireto,txtEmail=:txtEmail,txtEndereco=:txtEndereco,txtInscricaoEstadual=:txtInscricaoEstadual,txtRazaoSocial=:txtRazaoSocial,txtTelefone=:txtTelefone WHERE idCliente=:idCliente";
        $sql =$pdo->prepare($sql);
        $sql->bindValue("txtCNPJ",$txtCNPJ);
        $sql->bindValue("txtContatoDireto",$txtContatoDireto);
        $sql->bindValue("txtEmail",$txtEmail);
        $sql->bindValue("txtEndereco",$txtEndereco);
        $sql->bindValue("txtInscricaoEstadual",$txtInscricaoEstadual);
        $sql->bindValue("txtRazaoSocial",$txtRazaoSocial);
        $sql->bindValue("txtTelefone",$txtTelefone);
        $sql->bindValue("idCliente",$idCliente);
        $sql->execute();
    }
	
    public function consultarCliente($idCliente){
        global $pdo;
        
        $sql = "SELECT txtCNPJ,txtContatoDireto,txtEmail,txtEndereco,txtInscricaoEstadual,txtRazaoSocial,txtTelefone FROM cliente WHERE idCliente=:idCliente";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idCliente",$idCliente);
        $sql->execute();

        if($sql->rowCount() >0){
            $dado = $sql->fetch();

            $this->txtCNPJ = $dado['txtCNPJ'];
            $this->txtContatoDireto = $dado['txtContatoDireto'];
            $this->txtEmail = $dado['txtEmail'];
            $this->txtEndereco = $dado['txtEndereco'];
            $this->txtInscricaoEstadual = $dado['txtInscricaoEstadual'];
            $this->txtRazaoSocial = $dado['txtRazaoSocial'];
            $this->txtTelefone = $dado['txtTelefone'];

            return true;        
        }else{
            return false;
        }

    }
    public function listarClientes(){
        global $pdo;


        $sql = "SELECT idCliente,txtCNPJ,txtContatoDireto,txtEmail,txtEndereco,txtInscricaoEstadual,txtRazaoSocial,txtTelefone FROM cliente" ;
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $dado = $sql->fetchAll();
        //print_r($dado);

        return $dado;
    }

    public function excluirCliente($idCliente){
        global $pdo;

        $sql = "DELETE FROM cliente WHERE idCliente=:idCliente";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idCliente",$idCliente);
        $sql->execute();

        if($sql->rowCount() >0){

            return true;       
        }else{
            return false;
        }
    }*/
}
