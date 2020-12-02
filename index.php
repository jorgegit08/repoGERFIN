<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="css/style1.css"/>
         <title>Gerfin</title>
    </head>
    <body>

        <script type="text/javascript" src="/TCC/assets/jquery/jQuery-3.3.1/jquery-3.3.1.js"></script>
        <style>

            a:link, a:visited, a:active {
                text-decoration: none;
                color:#00BFFF;
                font-size:110%;
            }

            a:hover {
                text-decoration: underline;  
                font-size:110%; 
            }
        </style>
        
        <?php 
            require 'assets/jquery/jQuery-Mask-Plugin-master/jQueryMascara.php';
        ?>

        <div class="bg" style="background-image: url('https://img.rawpixel.com/s3fs-private/rawpixel_images/website_content/rm27-ning-30-background.jpg?bg=transparent&con=3&cs=srgb&dpr=1&fm=jpg&ixlib=php-3.1.0&q=80&usm=15&vib=3&w=1300&s=99c1e8ec92a449794a08589bee35a2dc');">

            <div class="box1">
                
                <h1>Gerenciador Financeiro</h1>
                <form action="view/menuInicial.php" method="POST">
                    <input type="text" style="width: 150px" class="mascaraEmailAsj" placeholder="E-mail" name="txtEmail" id="txtEmail" required="required">@asj.adv.br<br>

                    <input type="password" style="width: 223px" placeholder="Senha" name="txtSenha" id="txtSenha" required="required"> <br>

                    <div class="margemCima30"> 
                        <input type="submit" style="width: 223px" class="botaoCadastro" value="Login"/> 
                    </div>

                </form>

                <a href="view/recuperarSenha.php">Esqueci minha senha</a> <br><br>
                <a href="view/cadastrarUsuario.php">Criar nova conta</a>

            </div>

        </div>

    </body>
</html>
