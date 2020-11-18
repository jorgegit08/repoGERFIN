<?php

 class Cliente{

    public $idCliente="";
    public $txtCNPJ="";
    public $txtContatoDireto="";
    public $txtEmail="";
    public $txtEndereco="";
    public $txtInscricaoEstadual="";
    public $txtRazaoSocial="";
    public $txtTelefone="";    

    public function cadastrarCliente($txtCNPJ,$txtContatoDireto,$txtEmail,$txtEndereco,$txtInscricaoEstadual,$txtRazaoSocial,$txtTelefone){
        global $pdo;
		
        $sql = "SELECT * FROM cliente WHERE txtCNPJ=:txtCNPJ";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("txtCNPJ",$txtCNPJ);
        $sql->execute();

        if($sql->rowCount()=== 0){
            $sql ="INSERT into cliente (txtCNPJ,txtContatoDireto,txtEmail,txtEndereco,txtInscricaoEstadual,txtRazaoSocial,txtTelefone) VALUES (:txtCNPJ,:txtContatoDireto,:txtEmail,:txtEndereco,:txtInscricaoEstadual,:txtRazaoSocial,:txtTelefone)";
            $sql =$pdo->prepare($sql);
            $sql->bindValue("txtCNPJ",$txtCNPJ);
            $sql->bindValue("txtContatoDireto",$txtContatoDireto);
            $sql->bindValue("txtEmail",$txtEmail);
            $sql->bindValue("txtEndereco",$txtEndereco);
            $sql->bindValue("txtInscricaoEstadual",$txtInscricaoEstadual);
            $sql->bindValue("txtRazaoSocial",$txtRazaoSocial);
            $sql->bindValue("txtTelefone",$txtTelefone);
            $sql->execute();

            return true;
        }else{
            return false;
        }
    }

    public function alterarCliente($idCliente,$txtCNPJ,$txtContatoDireto,$txtEmail,$txtEndereco,$txtInscricaoEstadual,$txtRazaoSocial,$txtTelefone){
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
    }
}
