<?php

 class Cliente{

    public $idCliente="";
    public $txtCnpj="";
    public $txtContatoDireto="";
    public $txtEmail="";
    public $txtEndereco="";
    public $txtInscricaoEstadual="";
    public $txtRazaoSocial="";
    public $txtTelefone="";

    //$idCliente,
    //$txtCnpj,$txtContatoDireto,$txtEmail,$txtEndereco,$txtInscricaoEstadual,$txtRazaoSocial,$txtTelefone
    

    public function cadastrarCliente($txtCnpj,$txtContatoDireto,$txtEmail,$txtEndereco,$txtInscricaoEstadual,$txtRazaoSocial,$txtTelefone){
        global $pdo;

        $sql = "SELECT * FROM cliente WHERE txtcnpj=:txtcnpj";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("txtcnpj",$txtcnpj);
        $sql->execute();

        if($sql->rowCount()=== 0){
            $sql ="INSERT into cliente (txtCnpj,txtContatoDireto,txtEmail,txtEndereco,txtInscricaoEstadual,txtRazaoSocial,txtTelefone) VALUES (:txtCnpj,:txtContatoDireto,:txtEmail,:txtEndereco,:txtInscricaoEstadual,:txtRazaoSocial,;txtTelefone)";
            $sql =$pdo->prepare($sql);
            $sql->bindValue("txtCnpj",$txtCnpj);
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
    public function alterarCliente($idCliente,$Cnpj,$txtContatoDireto,$txtEmail,$txtEndereco,$txtInscricaoEstadual,$txtRazaoSocial,$txtTelefone){
        global $pdo;
        //$this->consultarUsuario();

        $sql ="UPDATE cliente SET txtCnpj=:txtCnpj,txtContatoDireto=:txtContatoDireto,txtEmail=:txtEmail,txtEndereco=:txtEndereco,txtInscricaoEstadual=:txtInscricaoEstadual,txtRazaoSocial=:txtRazaoSocial,txtTelefone=:txtTelefone WHERE idCliente=:idCliente";
        
        $sql->bindValue("txtCnpj",$Cnpj);
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
        
        $sql = "SELECT txtCnpj,txtContatoDireto,txtEmail,txtEndereco,txtInscricaoEstadual,txtRazaoSocial,txtTelefone FROM cliente WHERE idCliente=:idCliente";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idCliente",$idCliente);
        $sql->execute();

        if($sql->rowCount() >0){
            $dado = $sql->fetch();

            $this->txtCnpj = $dado['txtCnpj'];
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


        $sql = "SELECT idCliente,txtCnpj,txtContatoDireto,txtEmail,txtEndereco,txtInscricaoEstadual,txtRazaoSocial,txtTelefone FROM cliente" ;
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $dado = $sql->fetchAll();
        //print_r($dado);

        return $dado;
    }

    public function excluirUsuario($idCliente){
        global $pdo;

        $sql = "DELETE FROM cliente WHERE idCliente=:idCliente";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idCLiente",$idCliente);
        $sql->execute();

        if($sql->rowCount() >0){

            return true;       
        }else{
            return false;
        }
    }
}
