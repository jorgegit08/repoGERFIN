<?php

 class TipoRecebimento{

    public $idTipoRecebimento="";
    public $txtDescricao="";
		
    public function cadastrarTipoRecebimento($txtDescricao){
        global $pdo;
		
        $sql = "SELECT * FROM tiporecebimento WHERE txtDescricao=:txtDescricao";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("txtDescricao",$txtDescricao);
        $sql->execute();

        if($sql->rowCount()=== 0){
            $sql ="INSERT INTO tiporecebimento (txtDescricao) VALUES (:txtDescricao)";
            $sql =$pdo->prepare($sql);
            $sql->bindValue("txtDescricao",$txtDescricao);
            $sql->execute();

            return true;
        }else{
            return false;
        }
    }
    public function alterarTipoRecebimento($idTipoRecebimento,$txtDescricao){
        global $pdo;
        
			$sql ="UPDATE tiporecebimento SET txtDescricao=:txtDescricao WHERE idTipoRecebimento=:idTipoRecebimento";
			$sql =$pdo->prepare($sql);
			$sql->bindValue("txtDescricao",$txtDescricao);
			$sql->bindValue("idTipoRecebimento",$idTipoRecebimento);
			$sql->execute();
			
			return true;
	}		
    
	
    public function consultarTipoRecebimento($idTipoRecebimento){
        global $pdo;
        
        $sql = "SELECT idTipoRecebimento,txtDescricao FROM tipoRecebimento WHERE idTipoRecebimento=:idTipoRecebimento";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idTipoRecebimento",$idTipoRecebimento);
        $sql->execute();

        if($sql->rowCount() >0){
            $dado = $sql->fetch();

            $this->idTipoRecebimento = $dado['idTipoRecebimento'];
            $this->txtDescricao = $dado['txtDescricao'];
            
            return true;        
        }else{
            return false;
        }

    }
    public function listarTiposRecebimento(){
        global $pdo;


        $sql = "SELECT idTipoRecebimento,txtDescricao FROM tiporecebimento" ;
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $dado = $sql->fetchAll();

        return $dado;
    }

    public function excluirTipoRecebimento($idTipoRecebimento){
        global $pdo;

        $sql = "DELETE FROM tiporecebimento WHERE idTipoRecebimento=:idTipoRecebimento";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idTipoRecebimento",$idTipoRecebimento);
        $sql->execute();

        if($sql->rowCount() >0){

            return true;       
        }else{
            return false;
        }
    }
}
