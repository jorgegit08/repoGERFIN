<?php

  class Pagamento{

    public $idPagamento="";
    public $idTipoPagamento="";	
    public $txtDescricao="";	
    public $datVencimento="";	
    public $datPagamento="";	
    public $vlrValor="";

    

    public function cadastrarPagamento($idTipoPagamento,$txtDescricao,$datVencimento,$datPagamento,$vlrValor){
        global $pdo;
		
        
            $sql ="INSERT into pagamento (idTipoPagamento,txtDescricao,datVencimento,datPagamento,vlrValor) VALUES (:idTipoPagamento,:txtDescricao,:datVencimento,:datPagamento,:vlrValor)";
            $sql =$pdo->prepare($sql);
            $sql->bindValue("idTipoPagamento",$idTipoPagamento);
            $sql->bindValue("txtDescricao",$txtDescricao);
            $sql->bindValue("datVencimento",$datVencimento);
            $sql->bindValue("datPagamento",$datPagamento);
            $sql->bindValue("vlrValor",$vlrValor);
            $sql->execute();

            return true;
    }

    public function alterarPagamento($idPagamento,$idTipoPagamento,$txtDescricao,$datVencimento,$datPagamento,$vlrValor){
        global $pdo;
        

        $sql ="UPDATE pagamento SET idTipoPagamento=:idTipoPagamento,txtDescricao=:txtDescricao,datVencimento=:datVencimento,datPagamento=:datPagamento,vlrValor=:vlrValor WHERE idPagamento=:idPagamento";
        $sql =$pdo->prepare($sql);
        $sql->bindValue("idPagamento",$idPagamento);
        $sql->bindValue("idTipoPagamento",$idTipoPagamento);
        $sql->bindValue("txtDescricao",$txtDescricao);
        $sql->bindValue("datVencimento",$datVencimento);
        $sql->bindValue("datPagamento",$datPagamento);
        $sql->bindValue("vlrValor",$vlrValor);
        $sql->execute();
    }
	
    public function consultarPagamento($idPagamento){
        global $pdo;
        
        $sql = "SELECT idTipoPagamento,txtDescricao,datVencimento,datPagamento,vlrValor FROM pagamento WHERE idPagamento=:idPagamento";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idPagamento",$idPagamento);
        $sql->execute();

        if($sql->rowCount() >0){
            $dado = $sql->fetch();

            $this->idPagamento = $idPagamento;
            $this->idTipoPagamento = $dado['idTipoPagamento'];
            $this->txtDescricao = $dado['txtDescricao'];
            $this->datVencimento = $dado['datVencimento'];
            $this->datPagamento = $dado['datPagamento'];
            $this->vlrValor = $dado['vlrValor'];
            

            return true;        
        }else{
            return false;
        }

    }
    public function listarPagamentos(){
        global $pdo;


        $sql = "SELECT p.idPagamento,p.idTipoPagamento,p.txtDescricao,tp.txtDescricao AS desctppagamento,p.datVencimento,p.datPagamento,p.vlrValor ". 
                "FROM pagamento p ". 
                "INNER JOIN tipoPagamento tp on tp.idTipoPagamento=p.idTipoPagamento";
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $dado = $sql->fetchAll();
        //print_r($dado);

        return $dado;
    }

    public function excluirPagamento($idPagamento){
        global $pdo;

        $sql = "DELETE FROM pagamento WHERE idPagamento=:idPagamento";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idPagamento",$idPagamento);
        $sql->execute();

        if($sql->rowCount() >0){

            return true;       
        }else{
            return false;
        }
    }
}
