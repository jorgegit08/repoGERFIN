<?php 
 class Usuario{
	
	public $idUsuario="";
    public $txtCPF="";
    public $txtNome="";
    public $txtSenha="";
    public $txtEmail="";
    public $txtTelefone="";
    public $datNascimento="";

    public function login($txtEmail,$txtSenha){
        global $pdo;

        $sql = "SELECT * FROM usuario WHERE txtEmail = :txtEmail AND txtSenha = :txtSenha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("txtEmail",$txtEmail);
        $sql->bindValue("txtSenha",md5($txtSenha));
        $sql->execute();
		
        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
			
            $_SESSION['txtEmail'] = $dado['txtEmail'];
			
            return true;        
        }else{
            return false;
        }
    } 

    public function cadastrarUsuario($txtCPF,$txtNome,$txtSenha,$txtEmail,$txtTelefone,$datNascimento){
        global $pdo;

        $sql = "SELECT * FROM usuario WHERE txtEmail = :txtEmail";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("txtEmail",$txtEmail);
        $sql->execute();
		
			
		
        if($sql->rowCount()=== 0){
            $sql ="INSERT into usuario (txtCPF,txtNome,txtSenha,txtEmail,txtTelefone,datNascimento) VALUES (:txtCPF,:txtNome,:txtSenha,:txtEmail,:txtTelefone,:datNascimento)";
            $sql =$pdo->prepare($sql);
            $sql->bindValue("txtCPF",$txtCPF);
            $sql->bindValue("txtNome",$txtNome);
            $sql->bindValue("txtSenha",md5($txtSenha));
            $sql->bindValue("txtEmail",$txtEmail);
            $sql->bindValue("txtTelefone",$txtTelefone);
            $sql->bindValue("datNascimento",$datNascimento);
            $sql->execute();

            return true;
        }else{
            return false;
        }
    }
	
    public function alterarUsuario($txtCPF,$txtNome,$txtSenha,$txtEmail,$txtTelefone,$datNascimento){
        global $pdo;
        $this->consultarUsuario();
	
        $sql ="UPDATE usuario SET txtCPF=:txtCPF,txtNome=:txtNome,txtSenha=:txtSenha,txtEmail=:txtEmail,txtTelefone=:txtTelefone,datNascimento=:datNascimento WHERE txtCPF = :cpfAtual";
        $sql =$pdo->prepare($sql);
        $sql->bindValue("txtCPF",$txtCPF);
        $sql->bindValue("txtNome",$txtNome);
        $sql->bindValue("txtSenha",md5($txtSenha));
        $sql->bindValue("txtEmail",$txtEmail);
        $sql->bindValue("txtTelefone",$txtTelefone);
        $sql->bindValue("datNascimento",$datNascimento);
        $sql->bindValue("cpfAtual",$this->txtCPF);
        $sql->execute();
    }
    public function consultarUsuario(){
        global $pdo;

        $sql = "SELECT idUsuario,txtCPF,txtNome,txtSenha,txtEmail,txtTelefone,datNascimento FROM usuario WHERE txtEmail=:txtEmail";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("txtEmail",$_SESSION['txtEmail']);
        $sql->execute();

        if($sql->rowCount() >0){
            $dado = $sql->fetch();

            $this->txtNome = $dado['txtNome'];
            $this->txtSenha = $dado['txtSenha'];
            $this->txtEmail = $dado['txtEmail'];
            $this->txtTelefone = $dado['txtTelefone'];
            $this->datNascimento = $dado['datNascimento'];
            $this->txtCPF = $dado['txtCPF'];
			$this->idUsuario = $dado['idUsuario'];

            return true;        
        }else{
            return false;
        }

    }
    public function excluirUsuario($txtSenha){
        global $pdo;

        $sql = "DELETE FROM usuario WHERE txtEmail = :txtEmail AND txtSenha = :txtSenha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("txtEmail",$_SESSION['txtEmail']);
        $sql->bindValue("txtSenha",md5($txtSenha));
        $sql->execute();
		
		//echo $_SESSION['txtEmail'] . " " . $txtSenha . " " . md5($txtSenha) . " ";
		//die("numLinhas: " . $sql->rowCount());
		
        if($sql->rowCount() > 0){

            return true;       
        }else{
            return false;
        }
    }
}
