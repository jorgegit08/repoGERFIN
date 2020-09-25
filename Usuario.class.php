<?php

 class Usuario{

    public $cpf="";
    public $nome="";
    public $senha="";
    public $email="";
    public $telefone="";
    public $nascimento="";

    public function login($email,$senha){
        global $pdo;

        $sql = "SELECT * FROM usuarios WHERE email =:email AND senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("email",$email);
        $sql->bindValue("senha",md5($senha));
        $sql->execute();

        if($sql->rowCount() >0){
            $dado = $sql->fetch();

            $_SESSION['email'] = $dado['email'];
            return true;        
        }else{
            return false;
        }
    } 

    public function cadastrarUsuario($cpf,$nome,$senha,$email,$telefone,$nascimento){
        global $pdo;

        $sql = "SELECT * FROM usuarios WHERE email=:email";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("email",$email);
        $sql->execute();

        if($sql->rowCount()=== 0){
            $sql ="INSERT into usuarios (cpf,nome,senha,email,telefone,nascimento) VALUES (:cpf,:nome,:senha,:email,:telefone,:nascimento)";
            $sql =$pdo->prepare($sql);
            $sql->bindValue("cpf",$cpf);
            $sql->bindValue("nome",$nome);
            $sql->bindValue("senha",md5($senha));
            $sql->bindValue("email",$email);
            $sql->bindValue("telefone",$telefone);
            $sql->bindValue("nascimento",$nascimento);
            $sql->execute();

            return true;
        }else{
            return false;
        }
    }
    public function alterarUsuario($cpf,$nome,$senha,$email,$telefone,$nascimento){
        global $pdo;
        $this->consultarUsuario();

        $sql ="UPDATE usuarios SET cpf=:cpf,nome=:nome,senha=:senha,email=:email,telefone=:telefone,nascimento=:nascimento WHERE cpf=:cpfAtual";
        $sql =$pdo->prepare($sql);
        $sql->bindValue("cpf",$cpf);
        $sql->bindValue("nome",$nome);
        $sql->bindValue("senha",md5($senha));
        $sql->bindValue("email",$email);
        $sql->bindValue("telefone",$telefone);
        $sql->bindValue("nascimento",$nascimento);
        $sql->bindValue("cpfAtual",$this->cpf);
        $sql->execute();
    }
    public function consultarUsuario(){
        global $pdo;
        
        $sql = "SELECT cpf,nome,senha,email,telefone,nascimento FROM usuarios WHERE email=:email";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("email",$_SESSION['email']);
        $sql->execute();

        if($sql->rowCount() >0){
            $dado = $sql->fetch();

            $this->nome = $dado['nome'];
            $this->senha = $dado['senha'];
            $this->email = $dado['email'];
            $this->telefone = $dado['telefone'];
            $this->nascimento = $dado['nascimento'];
            $this->cpf = $dado['cpf'];

            return true;        
        }else{
            return false;
        }

    }
    public function excluirUsuario($senha){
        global $pdo;

        $sql = "DELETE FROM usuarios WHERE email =:email AND senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("email",$_SESSION['email']);
        $sql->bindValue("senha",md5($senha));
        $sql->execute();

        if($sql->rowCount() >0){

            return true;       
        }else{
            return false;
        }
    }
}
