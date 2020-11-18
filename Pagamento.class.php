<?php

  class Pagamento{

    public $idPagamento="";
    public $idTipoPagamento="";	
    public $txtDescricao="";	
    public $datVencimento="";	
    public $datPagamento="";	
    public $vlrValor="";
    public $desctppagamento="";

    

    public function cadastrarPagamento($idTipoPagamento,$txtDescricao,$datVencimento,$datPagamento,$vlrValor){
        global $pdo;

            if( empty($datPagamento) ){
                $datPagamento = null;  
            }else{
                $datPagamento = implode('-', array_reverse(explode('/',$datPagamento)));
            }
        
            $sql = "INSERT into pagamento (idTipoPagamento,txtDescricao,datVencimento,datPagamento,vlrValor) ".
                   "     VALUES (:idTipoPagamento,:txtDescricao,:datVencimento,:datPagamento,:vlrValor) ";

            $sql =$pdo->prepare($sql);
            $sql->bindValue("idTipoPagamento",$idTipoPagamento);
            $sql->bindValue("txtDescricao",$txtDescricao);
            $sql->bindValue("datVencimento",implode('-', array_reverse(explode('/',$datVencimento))));
            $sql->bindValue("datPagamento",$datPagamento);
            $sql->bindValue("vlrValor",str_replace(',','.', str_replace('.','', $vlrValor)));
            $sql->execute();

            return $pdo->lastInsertId();
    }

    public function alterarPagamento($idPagamento,$idTipoPagamento,$txtDescricao,$datVencimento,$datPagamento,$vlrValor){
        global $pdo;
        
        if( empty($datPagamento) ){
            $datPagamento = null;  
        }else{
            $datPagamento = implode('-', array_reverse(explode('/',$datPagamento)));
        }

        $sql = "UPDATE pagamento ".
               "   SET idTipoPagamento=:idTipoPagamento,txtDescricao=:txtDescricao, ".
               "       datVencimento=:datVencimento,datPagamento=:datPagamento,vlrValor=:vlrValor WHERE idPagamento=:idPagamento ";
        
        $sql =$pdo->prepare($sql);
        $sql->bindValue("idPagamento",$idPagamento);
        $sql->bindValue("idTipoPagamento",$idTipoPagamento);
        $sql->bindValue("txtDescricao",$txtDescricao);
        $sql->bindValue("datVencimento",implode('-', array_reverse(explode('/',$datVencimento))));
        $sql->bindValue("datPagamento",$datPagamento);
        $sql->bindValue("vlrValor",str_replace(',','.', str_replace('.','', $vlrValor)));
        $sql->execute();
    }
	
    public function consultarPagamento($idPagamento){
        global $pdo;
        
        $sql = "SELECT p.idTipoPagamento,p.txtDescricao,p.datVencimento,p.datPagamento,p.vlrValor,tp.txtDescricao AS desctppagamento ".
               "  FROM pagamento p ".
               " INNER JOIN tipoPagamento tp on tp.idTipoPagamento=p.idTipoPagamento ".
               " WHERE idPagamento=:idPagamento ";
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
            $this->vlrValor = str_replace('.',',',$dado['vlrValor']);
            $this->desctppagamento = $dado['desctppagamento'];
            
            return true;        
        }else{
            return false;
        }

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

    public function listarPagamentos(){
        global $pdo;

        $sql = "SELECT p.idPagamento,p.idTipoPagamento,p.txtDescricao,tp.txtDescricao AS desctppagamento,DATE_FORMAT(p.datVencimento, '%d/%m/%Y') as datVencimento,".
               "       DATE_FORMAT(p.datPagamento, '%d/%m/%Y') as datPagamento,format(p.vlrValor,2,'de_DE') as vlrValor ". 
               "  FROM pagamento p ". 
               " INNER JOIN tipoPagamento tp on tp.idTipoPagamento=p.idTipoPagamento";

        $sql = $pdo->prepare($sql);
        $sql->execute();

        $dado = $sql->fetchAll();

        return $dado;
    }

    public function listarPagamentosPorPeriodo($dataInicial, $dataFinal){
        global $pdo;


        $sql = "SELECT p.idPagamento,p.idTipoPagamento,p.txtDescricao,tp.txtDescricao AS desctppagamento,DATE_FORMAT(p.datVencimento, '%d/%m/%Y') as datVencimento,".
               "       DATE_FORMAT(p.datPagamento, '%d/%m/%Y') as datPagamento,format(p.vlrValor,2,'de_DE') as vlrValor ". 
               "  FROM pagamento p ". 
               " INNER JOIN tipoPagamento tp on tp.idTipoPagamento=p.idTipoPagamento ".
               " WHERE datVencimento BETWEEN :datInicial AND :datFinal ";

        $sql = $pdo->prepare($sql);
        $sql->bindValue("datInicial",implode('-', array_reverse(explode('/',$dataInicial))));
        $sql->bindValue("datFinal",implode('-', array_reverse(explode('/',$dataFinal))));
        $sql->execute();

        $dado = $sql->fetchAll();

        return $dado;
    }

    public function listarPagamentosPendentesPorPeriodo($dataInicial, $dataFinal){
        global $pdo;


        $sql = "SELECT p.idPagamento,p.idTipoPagamento,p.txtDescricao,tp.txtDescricao AS desctppagamento,DATE_FORMAT(p.datVencimento, '%d/%m/%Y') as datVencimento,".
               "       DATE_FORMAT(p.datPagamento, '%d/%m/%Y') as datPagamento,format(p.vlrValor,2,'de_DE') as vlrValor ". 
               "  FROM pagamento p ". 
               " INNER JOIN tipoPagamento tp on tp.idTipoPagamento=p.idTipoPagamento ".
               " WHERE datVencimento BETWEEN :datInicial AND :datFinal ".
               "   AND datPagamento is null ";

        $sql = $pdo->prepare($sql);
        $sql->bindValue("datInicial",implode('-', array_reverse(explode('/',$dataInicial))));
        $sql->bindValue("datFinal",implode('-', array_reverse(explode('/',$dataFinal))));
        $sql->execute();

        $dado = $sql->fetchAll();

        return $dado;
    }
    
}
