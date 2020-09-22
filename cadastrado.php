<?php
+
+require 'Usuario.class.php';
+
+$u = new Usuario();
+
+
+if(isset($_POST['email']) && !empty($_POST['email'])
+    &&    isset($_POST['cpf']) && !empty($_POST['cpf'])
+    &&    isset($_POST['senha']) && !empty($_POST['senha'])
+    &&    isset($_POST['nome']) && !empty($_POST['nome'])
+    &&    isset($_POST['nascimento']) && !empty($_POST['nascimento'])
+    &&    isset($_POST['telefone']) && !empty($_POST['telefone'])   ){
+
+        $email = addslashes($_POST['email']);
+        $cpf = addslashes($_POST['cpf']);
+        $nome = addslashes($_POST['nome']);
+        $senha = addslashes($_POST['senha']);
+        $nascimento = addslashes($_POST['nascimento']);
+        $telefone = addslashes($_POST['telefone']);
+
+        $u->cadastrar($cpf,$nome,$senha,$email,$telefone,$nascimento);
+    }else{
+        header("Location: cadastro.php");
+    }

+
+if(isset($_POST['email']) && !empty($_POST['email'])
+    &&    isset($_POST['cpf']) && !empty($_POST['cpf'])
+    &&    isset($_POST['senha']) && !empty($_POST['senha'])
+    &&    isset($_POST['nome']) && !empty($_POST['nome'])
+    &&    isset($_POST['nascimento']) && !empty($_POST['nascimento'])
+    &&    isset($_POST['telefone']) && !empty($_POST['telefone'])   ){
+
+        $email = addslashes($_POST['email']);
+        $cpf = addslashes($_POST['cpf']);
+        $nome = addslashes($_POST['nome']);
+        $senha = addslashes($_POST['senha']);
+        $nascimento = addslashes($_POST['nascimento']);
+        $telefone = addslashes($_POST['telefone']);
+
+        $u->cadastrar($cpf,$nome,$senha,$email,$telefone,$nascimento);
+    }else{
+        header("Location: cadastro.php");
+    }
