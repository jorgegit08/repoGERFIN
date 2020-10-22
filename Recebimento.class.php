<?php

  class Recebimento{

    public $idRecebimento="";
    public $idCliente="";
    public $txtContrato="";
    public $txtGestor="";
    public $idTipoRecebimento="";	
    public $txtDescricao="";
    public $vlrBruto="";
    public $vlrLiquido="";	
    public $datVencimento="";	
    public $datPagamento="";	
    public $desctpRecebimento="";
    public $numNFe="";

    

    public function cadastrarRecebimento($idTipoRecebimento,$idCliente,$txtContrato,$txtGestor,$txtDescricao,$vlrBruto,$vlrLiquido,$datVencimento,$datPagamento,$numNFe){
        global $pdo;
		
        
            $sql ="INSERT into recebimento (idCliente,txtContrato,txtGestor,idTipoRecebimento,txtDescricao,vlrBruto,vlrLiquido,datVencimento,datPagamento,numNFe) VALUES (:idCliente,:txtContrato,:txtGestor,:idTipoRecebimento,:txtDescricao,:vlrBruto,:vlrLiquido,:datVencimento,:datPagamento,:numNFe)";
            $sql =$pdo->prepare($sql);
            $sql->bindValue("idCliente",$idCliente);
            $sql->bindValue("txtContrato",$txtContrato);
            $sql->bindValue("txtGestor",$txtGestor);
            $sql->bindValue("idTipoRecebimento",$idTipoRecebimento);
            $sql->bindValue("txtDescricao",$txtDescricao);
            $sql->bindValue("datVencimento",implode('-', array_reverse(explode('/',$datVencimento))));
            $sql->bindValue("datPagamento",implode('-', array_reverse(explode('/',$datPagamento))));
            $sql->bindValue("vlrBruto",str_replace(',','.', str_replace('.','', $vlrBruto)));
            $sql->bindValue("vlrLiquido",str_replace(',','.', str_replace('.','', $vlrLiquido)));
            $sql->bindValue("numNFe",$numNFe);
            $sql->execute();

            return true;
    }

    public function alterarRecebimento($idRecebimento,$idCliente,$txtContrato,$txtGestor,$idTipoRecebimento,$txtDescricao,$vlrBruto,$vlrLiquido,$datVencimento,$datPagamento,$numNFe){
        global $pdo;
        

        $sql ="UPDATE recebimento SET idCliente=:idCliente,txtContrato=:txtContrato,txtGestor=:txtGestor,idTipoRecebimento=:idTipoRecebimento,txtDescricao=:txtDescricao,vlrBruto=:vlrBruto,vlrLiquido=:vlrLiquido,datVencimento=:datVencimento,datPagamento=:datPagamento,numNFe=:numNFe WHERE idRecebimento=:idRecebimento";
        $sql =$pdo->prepare($sql);
        $sql->bindValue("idRecebimento",$idRecebimento);
        $sql->bindValue("idCliente",$idCliente);
        $sql->bindValue("txtContrato",$txtContrato);
        $sql->bindValue("txtGestor",$txtGestor);
        $sql->bindValue("idTipoRecebimento",$idTipoRecebimento);
        $sql->bindValue("txtDescricao",$txtDescricao);
        $sql->bindValue("datVencimento",implode('-', array_reverse(explode('/',$datVencimento))));
        $sql->bindValue("datPagamento",implode('-', array_reverse(explode('/',$datPagamento))));
        $sql->bindValue("vlrBruto",str_replace(',','.', str_replace('.','', $vlrBruto)));
        $sql->bindValue("vlrLiquido",str_replace(',','.', str_replace('.','', $vlrLiquido)));
        $sql->bindValue("numNFe",$numNFe);
        $sql->execute();
    }
	
    public function consultarRecebimento($idRecebimento){
        global $pdo;
        
        $sql = "SELECT r.txtContrato,r.txtGestor,r.idCliente,r.idTipoRecebimento,r.txtDescricao,r.datVencimento,r.datPagamento,r.vlrBruto,r.vlrLiquido,tr.txtDescricao,r.numNFe,tr.txtDescricao as desctpRecebimento ".
            " FROM recebimento r".
            " INNER JOIN tipoRecebimento tr on tr.idTipoRecebimento=r.idTipoRecebimento".
            " WHERE r.idRecebimento=:idRecebimento";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idRecebimento",$idRecebimento);
        $sql->execute();

        if($sql->rowCount() >0){
            $dado = $sql->fetch();

            $this->idRecebimento = $idRecebimento;
            $this->txtContrato = $dado['txtContrato'];
            $this->idCliente = $dado['idCliente'];
            $this->txtGestor = $dado['txtGestor'];
            $this->idTipoRecebimento = $dado['idTipoRecebimento'];
            $this->txtDescricao = $dado['txtDescricao'];
            $this->datVencimento = $dado['datVencimento'];
            $this->datPagamento = $dado['datPagamento'];
            $this->vlrBruto = str_replace('.',',',$dado['vlrBruto']);
            $this->vlrLiquido = str_replace('.',',',$dado['vlrLiquido']);
            $this->desctpRecebimento = $dado['desctpRecebimento'];
            $this->numNFe = $dado['numNFe'];
            

            return true;        
        }else{
            return false;
        }

    }
    public function listarRecebimentos(){
        global $pdo;


        $sql = "SELECT r.idRecebimento,r.txtContrato,r.txtGestor,r.idCliente,r.idTipoRecebimento,r.txtDescricao, ".
                "DATE_FORMAT(r.datVencimento, '%d/%m/%Y') as datVencimento, DATE_FORMAT(r.datPagamento, '%d/%m/%Y') as datPagamento, ".
                "r.vlrBruto,r.vlrLiquido,tr.txtDescricao,r.numNFe,tr.txtDescricao as desctpRecebimento,c.txtRazaoSocial ". 
                "FROM recebimento r ". 
                "INNER JOIN tipoRecebimento tr on tr.idTipoRecebimento=r.idTipoRecebimento ".
                "INNER JOIN cliente c on c.idCliente=r.idCliente" ;
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $dado = $sql->fetchAll();
        //print_r($dado);

        return $dado;
    }

    public function excluirRecebimento($idRecebimento){
        global $pdo;

        $sql = "DELETE FROM recebimento WHERE idRecebimento=:idRecebimento";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idRecebimento",$idRecebimento);
        $sql->execute();

        if($sql->rowCount() >0){

            return true;       
        }else{
            return false;
        }
    }
    public function retornarValorLiquidoNFe($numNFe){
        global $pdo;

        $sql = "SELECT vlrLiquido from recebimento WHERE numNFe = :numNFe";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("numNFe",$numNFe);
        $sql->execute();
        $dado = $sql->fetch(); 
        
        return  $dado;
       
    }
}