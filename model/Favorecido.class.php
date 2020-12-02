<?php

 class Favorecido{

    public $idFavorecido="";
    public $txtNome="";
    public $txtCPFCNPJ="";
    public $datNascimento="";
    public $txtEmail="";
    public $txtOAB="";
    public $txtEndereco="";
    public $txtTelefone="";
		
    public function cadastrarFavorecido($txtNome,$txtCPFCNPJ,$datNascimento,$txtEmail,$txtOAB,$txtEndereco,$txtTelefone){
        global $pdo;

            if( empty($txtOAB) ){
                $txtOAB = null;  
            }
      
            $sql ="INSERT into favorecido (txtNome,txtCPFCNPJ,datNascimento,txtEmail,txtOAB,txtEndereco,txtTelefone) VALUES (:txtNome,:txtCPFCNPJ,:datNascimento,:txtEmail,:txtOAB,:txtEndereco,:txtTelefone)";
            $sql =$pdo->prepare($sql);
            $sql->bindValue("txtNome",$txtNome);
            $sql->bindValue("txtCPFCNPJ",$txtCPFCNPJ);
            $sql->bindValue("datNascimento",$datNascimento);
            $sql->bindValue("txtEmail",$txtEmail);
            $sql->bindValue("txtOAB",$txtOAB);
            $sql->bindValue("txtEndereco",$txtEndereco);
            $sql->bindValue("txtTelefone",$txtTelefone);
            $sql->execute(); 

    }
    public function alterarFavorecido($idFavorecido,$txtNome,$txtCPFCNPJ,$datNascimento,$txtEmail,$txtOAB,$txtEndereco,$txtTelefone){
        global $pdo;
        
        $this->consultarFavorecido($idFavorecido);
        
        if( empty($txtOAB) ){
            $txtOAB = null;  
        }

        $sql ="UPDATE favorecido SET txtNome=:txtNome,txtCPFCNPJ=:txtCPFCNPJ,datNascimento=:datNascimento,txtEmail=:txtEmail,txtOAB=:txtOAB,txtEndereco=:txtEndereco,txtTelefone=:txtTelefone WHERE idFavorecido=:idFavorecido";
        $sql =$pdo->prepare($sql);
        $sql->bindValue("txtNome",$txtNome);
        $sql->bindValue("txtCPFCNPJ",$txtCPFCNPJ);
        $sql->bindValue("datNascimento",$datNascimento);
        $sql->bindValue("txtEmail",$txtEmail);
        $sql->bindValue("txtOAB",$txtOAB);
        $sql->bindValue("txtEndereco",$txtEndereco);
        $sql->bindValue("txtTelefone",$txtTelefone);
        $sql->bindValue("idFavorecido",$idFavorecido);
        $sql->execute();
    }
	
    public function consultarFavorecido($idFavorecido){
        global $pdo;
        
        $sql = "SELECT txtNome,txtCPFCNPJ,datNascimento,txtEmail,txtOAB,txtEndereco,txtTelefone FROM favorecido WHERE idFavorecido=:idFavorecido";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idFavorecido",$idFavorecido);
        $sql->execute();

        if($sql->rowCount() >0){
            $dado = $sql->fetch();

            $this->txtNome = $dado['txtNome'];
            $this->txtCPFCNPJ = $dado['txtCPFCNPJ'];
            $this->datNascimento = $dado['datNascimento'];
            $this->txtEmail = $dado['txtEmail'];
            $this->txtOAB = $dado['txtOAB'];
            $this->txtEndereco = $dado['txtEndereco'];
            $this->txtTelefone = $dado['txtTelefone'];

            return true;        
        }else{
            return false;
        }

    }
    public function listarFavorecidos(){
        global $pdo;


        $sql = "SELECT idFavorecido,txtNome,txtCPFCNPJ,datNascimento,txtEmail,txtOAB,txtEndereco,txtTelefone FROM favorecido" ;
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $dado = $sql->fetchAll();

        return $dado;
    }

    public function excluirFavorecido($idFavorecido){
        global $pdo;

        $sql = "DELETE FROM favorecido WHERE idFavorecido=:idFavorecido";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idFavorecido",$idFavorecido);
        $sql->execute();

        if($sql->rowCount() >0){

            return true;       
        }else{
            return false;
        }
    }
}
