<?php 
 class Usuario{
	
	public $idUsuario="";
    public $txtCPF="";
    public $txtNome="";
    public $txtSenha="";
    public $txtEmail="";
    public $txtTelefone="";
    public $datNascimento="";
    public $codValidacao="";
    public $indSituacao="";

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
            $this->consultarUsuario();
			
            return true;        
        }else{
            return false;
        }
    } 

    public function recuperarSenha($txtEmail,$txtTelefone){
        global $pdo;
		
        $sql = "SELECT * FROM usuario WHERE txtEmail = :txtEmail AND txtTelefone = :txtTelefone";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("txtEmail",$txtEmail);
        $sql->bindValue("txtTelefone",$txtTelefone);
        $sql->execute();
		
        if($sql->rowCount() > 0){   			
            $dado = $sql->fetch();
			
            $idUsuario = $dado['idUsuario'];
            $novaSenha = rand(10000000,99999999);

            $sql ="UPDATE usuario SET txtSenha = :novaSenha WHERE idUsuario = :idUsuario";
            $sql =$pdo->prepare($sql);
            $sql->bindValue("idUsuario",$idUsuario);
            $sql->bindValue("novaSenha",md5($novaSenha));
            $sql->execute();
            
            if($sql->rowCount() > 0){   			
                return $novaSenha;
            }else{
                return false;
            }
        }else{
            return false;
        }
    } 

    public function cadastrarUsuario($txtCPF,$txtNome,$txtSenha,$txtEmail,$txtTelefone,$datNascimento,$codValidacao){
        global $pdo;

        $sql = "SELECT * FROM usuario WHERE txtEmail = :txtEmail";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("txtEmail",$txtEmail);
        $sql->execute();
        
        //Status 0 = Pendente de Validação | 1 = Ativo
        if($sql->rowCount()=== 0){
            $sql ="INSERT into usuario (txtCPF,txtNome,txtSenha,txtEmail,txtTelefone,datNascimento,codValidacao) ".
                  "             VALUES (:txtCPF,:txtNome,:txtSenha,:txtEmail,:txtTelefone,:datNascimento,:codValidacao)";

            $sql =$pdo->prepare($sql);
            $sql->bindValue("txtCPF",$txtCPF);
            $sql->bindValue("txtNome",$txtNome);
            $sql->bindValue("txtSenha",md5($txtSenha));
            $sql->bindValue("txtEmail",$txtEmail);
            $sql->bindValue("txtTelefone",$txtTelefone);
            $sql->bindValue("datNascimento",$datNascimento);
            $sql->bindValue("codValidacao",$codValidacao);
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

        $sql = "SELECT idUsuario,txtCPF,txtNome,txtSenha,txtEmail,txtTelefone,datNascimento,codValidacao,indSituacao FROM usuario WHERE txtEmail=:txtEmail";
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
            $this->codValidacao = $dado['codValidacao'];
            $this->indSituacao = $dado['indSituacao'];

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
		
        if($sql->rowCount() > 0){

            return true;       
        }else{
            return false;
        }
    }

    public function validarUsuario($idUsuario){
        global $pdo;
	
        $sql ="UPDATE usuario SET indSituacao = 1 WHERE idUsuario = :idUsuario";
        $sql =$pdo->prepare($sql);
        $sql->bindValue("idUsuario",$idUsuario);

        $sql->execute();
    }

}
