<?php

 class Favorecido{

    public $idFavorecido="";
    public $txtNome="";
    public $txtCPF="";
    public $datNascimento="";
    public $txtEmail="";
    public $txtOAB="";
    public $txtEndereco="";
    public $txtTelefone="";
		
    public function cadastrarFavorecido($txtNome,$txtCPF,$datNascimento,$txtEmail,$txtOAB,$txtEndereco,$txtTelefone){
        global $pdo;

            if( empty($txtCPF) ){
                $txtCPF = null;  
            }

            echo $datNascimento;

            if( empty($datNascimento) ){
                $datNascimento = null;  
            }else{
                $datNascimento = implode('-', array_reverse(explode('/',$datPagamento)));
            }

            if( empty($txtEmail) ){
                $txtEmail = null;  
            }

            if( empty($txtOAB) ){
                $txtOAB = null;  
            }

            if( empty($txtEndereco) ){
                $txtEndereco = null;  
            }

            if( empty($txtTelefone) ){
                $txtTelefone = null;  
            }
      
            $sql ="INSERT into favorecido (txtNome,txtCPF,datNascimento,txtEmail,txtOAB,txtEndereco,txtTelefone) VALUES (:txtNome,:txtCPF,:datNascimento,:txtEmail,:txtOAB,:txtEndereco,:txtTelefone)";
            $sql =$pdo->prepare($sql);
            $sql->bindValue("txtNome",$txtNome);
            $sql->bindValue("txtCPF",$txtCPF);
            $sql->bindValue("datNascimento",$datNascimento);
            $sql->bindValue("txtEmail",$txtEmail);
            $sql->bindValue("txtOAB",$txtOAB);
            $sql->bindValue("txtEndereco",$txtEndereco);
            $sql->bindValue("txtTelefone",$txtTelefone);
            $sql->execute(); 

    }
    public function alterarFavorecido($idFavorecido,$txtNome,$txtCPF,$datNascimento,$txtEmail,$txtOAB,$txtEndereco,$txtTelefone){
        global $pdo;
        
        $this->consultarFavorecido($idFavorecido);
        
        if( empty($txtCPF) ){
            $txtCPF = null;  
        }

        echo $datNascimento;

        if( empty($datNascimento) ){
            $datNascimento = null;  
        }else{
            $datNascimento = implode('-', array_reverse(explode('/',$datPagamento)));
        }

        if( empty($txtEmail) ){
            $txtEmail = null;  
        }

        if( empty($txtOAB) ){
            $txtOAB = null;  
        }

        if( empty($txtEndereco) ){
            $txtEndereco = null;  
        }

        if( empty($txtTelefone) ){
            $txtTelefone = null;  
        }

        $sql ="UPDATE favorecido SET txtNome=:txtNome,txtCPF=:txtCPF,datNascimento=:datNascimento,txtEmail=:txtEmail,txtOAB=:txtOAB,txtEndereco=:txtEndereco,txtTelefone=:txtTelefone WHERE idFavorecido=:idFavorecido";
        $sql =$pdo->prepare($sql);
        $sql->bindValue("txtNome",$txtNome);
        $sql->bindValue("txtCPF",$txtCPF);
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
        
        $sql = "SELECT txtNome,txtCPF,datNascimento,txtEmail,txtOAB,txtEndereco,txtTelefone FROM favorecido WHERE idFavorecido=:idFavorecido";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idFavorecido",$idFavorecido);
        $sql->execute();

        if($sql->rowCount() >0){
            $dado = $sql->fetch();

            $this->txtNome = $dado['txtNome'];
            $this->txtCPF = $dado['txtCPF'];
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


        $sql = "SELECT idFavorecido,txtNome,txtCPF,datNascimento,txtEmail,txtOAB,txtEndereco,txtTelefone FROM favorecido" ;
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $dado = $sql->fetchAll();
        //print_r($dado);

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
