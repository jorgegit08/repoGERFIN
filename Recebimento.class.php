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
    public $indCancelado="";
    public $datEmissao="";
    public $txtDescSituacao="";
    
    public function cadastrarRecebimento($idTipoRecebimento,$idCliente,$txtContrato,$txtGestor,$txtDescricao,$vlrBruto,$vlrLiquido,$datVencimento,$datPagamento,$numNFe,$indCancelado,$datEmissao){
        global $pdo;

            if( empty($datPagamento) ){
                $datPagamento = null;  
            }else{
                $datPagamento = implode('-', array_reverse(explode('/',$datPagamento)));
            }

            $sql ="INSERT into recebimento (idCliente,txtContrato,txtGestor,idTipoRecebimento,txtDescricao,vlrBruto,".
                  "                         vlrLiquido,datVencimento,datPagamento,numNFe,indCancelado,datEmissao) ".
                  "                 VALUES (:idCliente,:txtContrato,:txtGestor,:idTipoRecebimento,:txtDescricao,:vlrBruto,:vlrLiquido, ".
                  "                         :datVencimento,:datPagamento,:numNFe,:indCancelado,:datEmissao) ";

            $sql =$pdo->prepare($sql);
            $sql->bindValue("idCliente",$idCliente);
            $sql->bindValue("txtContrato",$txtContrato);
            $sql->bindValue("txtGestor",$txtGestor);
            $sql->bindValue("idTipoRecebimento",$idTipoRecebimento);
            $sql->bindValue("txtDescricao",$txtDescricao);
            $sql->bindValue("datVencimento",implode('-', array_reverse(explode('/',$datVencimento))));
            $sql->bindValue("datPagamento",$datPagamento);
            $sql->bindValue("vlrBruto",str_replace(',','.', str_replace('.','', $vlrBruto)));
            $sql->bindValue("vlrLiquido",str_replace(',','.', str_replace('.','', $vlrLiquido)));
            $sql->bindValue("numNFe",$numNFe);
            $sql->bindValue("indCancelado",$indCancelado);
            $sql->bindValue("datEmissao",implode('-', array_reverse(explode('/',$datEmissao))));
            $sql->execute();

            return true;
    }

    public function alterarRecebimento($idRecebimento,$idCliente,$txtContrato,$txtGestor,$idTipoRecebimento,$txtDescricao,$vlrBruto,$vlrLiquido,$datVencimento,$datPagamento,$numNFe,$indCancelado,$datEmissao){
        global $pdo;

        if( empty($datPagamento) ){
            $datPagamento = null;  
        }else{
            $datPagamento = implode('-', array_reverse(explode('/',$datPagamento)));
        }

        $sql ="UPDATE recebimento ".
              "       SET idCliente=:idCliente,txtContrato=:txtContrato,txtGestor=:txtGestor, ".
              "       idTipoRecebimento=:idTipoRecebimento,txtDescricao=:txtDescricao,vlrBruto=:vlrBruto, ".
              "       vlrLiquido=:vlrLiquido,datVencimento=:datVencimento,datPagamento=:datPagamento, ".
              "       numNFe=:numNFe,indCancelado=:indCancelado,datEmissao=:datEmissao WHERE idRecebimento=:idRecebimento ";

        $sql =$pdo->prepare($sql);
        $sql->bindValue("idRecebimento",$idRecebimento);
        $sql->bindValue("idCliente",$idCliente);
        $sql->bindValue("txtContrato",$txtContrato);
        $sql->bindValue("txtGestor",$txtGestor);
        $sql->bindValue("idTipoRecebimento",$idTipoRecebimento);
        $sql->bindValue("txtDescricao",$txtDescricao);
        $sql->bindValue("datVencimento",implode('-', array_reverse(explode('/',$datVencimento))));
        $sql->bindValue("datPagamento",$datPagamento);
        $sql->bindValue("vlrBruto",str_replace(',','.', str_replace('.','', $vlrBruto)));
        $sql->bindValue("vlrLiquido",str_replace(',','.', str_replace('.','', $vlrLiquido)));
        $sql->bindValue("numNFe",$numNFe);
        $sql->bindValue("indCancelado",$indCancelado);
        $sql->bindValue("datEmissao",implode('-', array_reverse(explode('/',$datEmissao))));
        $sql->execute();
    }
	
    public function consultarRecebimento($idRecebimento){
        global $pdo;
        
        $sql = "SELECT r.txtContrato,r.txtGestor,r.idCliente,r.idTipoRecebimento,r.txtDescricao, ".
               "       r.datVencimento,r.datPagamento,r.vlrBruto,r.vlrLiquido,tr.txtDescricao, ".
               "       r.numNFe,tr.txtDescricao as desctpRecebimento,r.indCancelado, ".
               "       r.datEmissao, ". 
               "       CASE WHEN indCancelado = 0 THEN 'Ativo' WHEN indCancelado = 1 THEN 'Cancelado' ELSE '' END txtDescSituacao ".
               "  FROM recebimento r ".
               " INNER JOIN tipoRecebimento tr on tr.idTipoRecebimento=r.idTipoRecebimento ".
               " WHERE r.idRecebimento=:idRecebimento ";

        $sql = $pdo->prepare($sql);
        $sql->bindValue("idRecebimento",$idRecebimento);
        $sql->execute();

        if($sql->rowCount() > 0){
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
            $this->indCancelado = $dado['indCancelado'];
            $this->datEmissao = $dado['datEmissao'];
            $this->txtDescSituacao = $dado['txtDescSituacao'];

            return true;        
        }else{
            return false;
        }

    }

    public function excluirRecebimento($idRecebimento){
        global $pdo;

        $sql = "DELETE FROM recebimento WHERE idRecebimento=:idRecebimento";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idRecebimento",$idRecebimento);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;       
        }else{
            return false;
        }
    }

    public function verificaNFeDistribuida($numNFe){
        global $pdo;
        
        $sql = "SELECT idPagamento FROM distrLucro WHERE numNFe = :numNFe";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("numNFe",$numNFe);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            return false;       
        }else{
            return true;
        }
    }

    public function retornarValorLiquidoNFe($numNFe){
        global $pdo;

        $sql = "SELECT vlrLiquido FROM recebimento WHERE numNFe = :numNFe";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("numNFe",$numNFe);
        $sql->execute();
        $dado = $sql->fetch();

        if( !$this->verificaNFeDistribuida($numNFe) ){
            return "A NFe nº: " . $numNFe . " já foi distribuída!";

        }elseif( $sql->rowCount() > 0 ){
            return str_replace('.',',',$dado['vlrLiquido']);

        }else{
            return "NFe nº " . $numNFe . " não encontrada!";
        }

    }

    public function listarRecebimentos(){
        global $pdo;

        $sql = "SELECT r.idRecebimento,r.txtContrato,r.txtGestor,r.idCliente,r.idTipoRecebimento,r.txtDescricao, ".
               "       DATE_FORMAT(r.datVencimento, '%d/%m/%Y') as datVencimento, DATE_FORMAT(r.datPagamento, '%d/%m/%Y') as datPagamento, ".
               "       r.vlrBruto,r.vlrLiquido,tr.txtDescricao,r.numNFe,tr.txtDescricao as desctpRecebimento,c.txtRazaoSocial, r.indCancelado, ".
               "       DATE_FORMAT(r.datEmissao, '%d/%m/%Y') as datEmissao, format(r.vlrBruto,2,'de_DE') as vlrBrutoFormatado, format(r.vlrLiquido,2,'de_DE') as vlrLiquidoFormatado, ". 
               "       CASE WHEN indCancelado = 0 THEN 'Ativo' WHEN indCancelado = 1 THEN 'Cancelado' ELSE '' END txtDescSituacao ".
               "       FROM recebimento r ". 
               " INNER JOIN tipoRecebimento tr on tr.idTipoRecebimento=r.idTipoRecebimento ".
               " INNER JOIN cliente c on c.idCliente=r.idCliente " ;

        $sql = $pdo->prepare($sql);
        $sql->execute();

        $dado = $sql->fetchAll();

        return $dado;
    }

    public function listarRecebimentosPorPeriodo($dataInicial, $dataFinal){
        global $pdo;


        $sql = "SELECT r.idRecebimento,r.txtContrato,r.txtGestor,r.idCliente,r.idTipoRecebimento,r.txtDescricao, ".
               "       DATE_FORMAT(r.datVencimento, '%d/%m/%Y') as datVencimento, DATE_FORMAT(r.datPagamento, '%d/%m/%Y') as datPagamento, ".
               "       r.vlrBruto,r.vlrLiquido,tr.txtDescricao,r.numNFe,tr.txtDescricao as desctpRecebimento,c.txtRazaoSocial, r.indCancelado, ".
               "       DATE_FORMAT(r.datEmissao, '%d/%m/%Y') as datEmissao, format(r.vlrBruto,2,'de_DE') as vlrBrutoFormatado, format(r.vlrLiquido,2,'de_DE') as vlrLiquidoFormatado, ".
               "       CASE WHEN indCancelado = 0 THEN 'Ativo' WHEN indCancelado = 1 THEN 'Cancelado' ELSE '' END txtDescSituacao ".
               "  FROM recebimento r ". 
               " INNER JOIN tipoRecebimento tr on tr.idTipoRecebimento=r.idTipoRecebimento ".
               " INNER JOIN cliente c on c.idCliente=r.idCliente " .
               " WHERE r.datEmissao BETWEEN :datInicial AND :datFinal ";

        $sql = $pdo->prepare($sql);
        $sql->bindValue("datInicial",implode('-', array_reverse(explode('/',$dataInicial))));
        $sql->bindValue("datFinal",implode('-', array_reverse(explode('/',$dataFinal))));
        $sql->execute();

        $dado = $sql->fetchAll();

        return $dado;
    }

    public function listarRecebimentosPagosPorPeriodo($dataInicial, $dataFinal){
        global $pdo;


        $sql = "SELECT r.idRecebimento,r.txtContrato,r.txtGestor,r.idCliente,r.idTipoRecebimento,r.txtDescricao, ".
               "       DATE_FORMAT(r.datVencimento, '%d/%m/%Y') as datVencimento, DATE_FORMAT(r.datPagamento, '%d/%m/%Y') as datPagamento, ".
               "       r.vlrBruto,r.vlrLiquido,tr.txtDescricao,r.numNFe,tr.txtDescricao as desctpRecebimento,c.txtRazaoSocial, r.indCancelado, ".
               "       DATE_FORMAT(r.datEmissao, '%d/%m/%Y') as datEmissao, format(r.vlrBruto,2,'de_DE') as vlrBrutoFormatado, format(r.vlrLiquido,2,'de_DE') as vlrLiquidoFormatado, ". 
               "       CASE WHEN indCancelado = 0 THEN 'Ativo' WHEN indCancelado = 1 THEN 'Cancelado' ELSE '' END txtDescSituacao ".
               "  FROM recebimento r ". 
               " INNER JOIN tipoRecebimento tr on tr.idTipoRecebimento=r.idTipoRecebimento ".
               " INNER JOIN cliente c on c.idCliente=r.idCliente ".
               " WHERE datPagamento is not null ".
               "   AND datEmissao BETWEEN :dataInicial AND :dataFinal ";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("dataInicial",implode('-', array_reverse(explode('/',$dataInicial))));
        $sql->bindValue("dataFinal",implode('-', array_reverse(explode('/',$dataFinal))));
        $sql->execute();

        $dado = $sql->fetchAll();

        return $dado;

    }

    public function listarRecebimentosPendentesPorPeriodo($dataInicial, $dataFinal){
        global $pdo;


        $sql = "SELECT r.idRecebimento,r.txtContrato,r.txtGestor,r.idCliente,r.idTipoRecebimento,r.txtDescricao, ".
               "       DATE_FORMAT(r.datVencimento, '%d/%m/%Y') as datVencimento, DATE_FORMAT(r.datPagamento, '%d/%m/%Y') as datPagamento, ".
               "       r.vlrBruto,r.vlrLiquido,tr.txtDescricao,r.numNFe,tr.txtDescricao as desctpRecebimento,c.txtRazaoSocial, r.indCancelado, ". 
               "       DATE_FORMAT(r.datEmissao, '%d/%m/%Y') as datEmissao, format(r.vlrBruto,2,'de_DE') as vlrBrutoFormatado, format(r.vlrLiquido,2,'de_DE') as vlrLiquidoFormatado, ". 
               "       CASE WHEN indCancelado = 0 THEN 'Ativo' WHEN indCancelado = 1 THEN 'Cancelado' ELSE '' END txtDescSituacao ".
               "  FROM recebimento r ". 
               " INNER JOIN tipoRecebimento tr on tr.idTipoRecebimento=r.idTipoRecebimento ".
               " INNER JOIN cliente c on c.idCliente=r.idCliente ".
               " WHERE datPagamento is null ".
               "   AND indCancelado = 0 ".
               "   AND datEmissao BETWEEN :dataInicial AND :dataFinal ";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("dataInicial",implode('-', array_reverse(explode('/',$dataInicial))));
        $sql->bindValue("dataFinal",implode('-', array_reverse(explode('/',$dataFinal))));
        $sql->execute();

        $dado = $sql->fetchAll();

        return $dado;

    }

    public function listarNotasCanceladasPorPeriodo($dataInicial, $dataFinal){
        global $pdo;


        $sql = "SELECT r.idRecebimento,r.txtContrato,r.txtGestor,r.idCliente,r.idTipoRecebimento,r.txtDescricao, ".
               "       DATE_FORMAT(r.datVencimento, '%d/%m/%Y') as datVencimento, DATE_FORMAT(r.datPagamento, '%d/%m/%Y') as datPagamento, ".
               "       r.vlrBruto,r.vlrLiquido,tr.txtDescricao,r.numNFe,tr.txtDescricao as desctpRecebimento,c.txtRazaoSocial, r.indCancelado, ". 
               "       DATE_FORMAT(r.datEmissao, '%d/%m/%Y') as datEmissao, format(r.vlrBruto,2,'de_DE') as vlrBrutoFormatado, format(r.vlrLiquido,2,'de_DE') as vlrLiquidoFormatado, ". 
               "       CASE WHEN indCancelado = 0 THEN 'Ativo' WHEN indCancelado = 1 THEN 'Cancelado' ELSE '' END txtDescSituacao ".
               "  FROM recebimento r ". 
               " INNER JOIN tipoRecebimento tr on tr.idTipoRecebimento=r.idTipoRecebimento ".
               " INNER JOIN cliente c on c.idCliente=r.idCliente".
               " WHERE indCancelado = 1".
               "   AND datEmissao BETWEEN :dataInicial AND :dataFinal";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("dataInicial",implode('-', array_reverse(explode('/',$dataInicial))));
        $sql->bindValue("dataFinal",implode('-', array_reverse(explode('/',$dataFinal))));
        $sql->execute();

        $dado = $sql->fetchAll();
        
        return $dado;
      
    }
}