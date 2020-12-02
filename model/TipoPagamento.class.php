<?php

 class TipoPagamento{

    public $idTipoPagamento="";
    public $txtDescricao="";
		
    public function cadastrarTipoPagamento($txtDescricao){
        global $pdo;
		
        $sql = "SELECT * FROM tipopagamento WHERE txtDescricao=:txtDescricao";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("txtDescricao",$txtDescricao);
        $sql->execute();

        if($sql->rowCount()=== 0){
            $sql ="INSERT into tipopagamento (txtDescricao) VALUES (:txtDescricao)";
            $sql =$pdo->prepare($sql);
            $sql->bindValue("txtDescricao",$txtDescricao);
            $sql->execute();

            return true;
        }else{
            return false;
        }
    }
    public function alterarTipoPagamento($idTipoPagamento,$txtDescricao){
        global $pdo;
        
			$sql ="UPDATE tipopagamento SET txtDescricao=:txtDescricao WHERE idTipoPagamento=:idTipoPagamento";
			$sql =$pdo->prepare($sql);
			$sql->bindValue("txtDescricao",$txtDescricao);
			$sql->bindValue("idTipoPagamento",$idTipoPagamento);
			$sql->execute();
			
			return true;
	}		
    
	
    public function consultarTipoPagamento($idTipoPagamento){
        global $pdo;
        
        $sql = "SELECT idTipoPagamento,txtDescricao FROM tipopagamento WHERE idTipoPagamento=:idTipoPagamento";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idTipoPagamento",$idTipoPagamento);
        $sql->execute();

        if($sql->rowCount() >0){
            $dado = $sql->fetch();

            $this->idTipoPagamento = $dado['idTipoPagamento'];
            $this->txtDescricao = $dado['txtDescricao'];
            
            return true;        
        }else{
            return false;
        }

    }
    public function listarTiposPagamento(){
        global $pdo;


        $sql = "SELECT idTipoPagamento,txtDescricao FROM tipopagamento" ;
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $dado = $sql->fetchAll();
        
        return $dado;
    }

    public function excluirTipoPagamento($idTipoPagamento){
        global $pdo;

        $sql = "DELETE FROM tipopagamento WHERE idTipoPagamento=:idTipoPagamento";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idTipoPagamento",$idTipoPagamento);
        $sql->execute();

        if($sql->rowCount() >0){

            return true;       
        }else{
            return false;
        }
    }
}
