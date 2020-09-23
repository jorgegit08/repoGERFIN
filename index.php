<?php







?>


<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="assets/css/style1.css"/>
         <title> TCC</title>
    </head>
    <body>
        <div class="bg" style="background-image: url('https://img.rawpixel.com/s3fs-private/rawpixel_images/website_content/rm27-ning-30-background.jpg?bg=transparent&con=3&cs=srgb&dpr=1&fm=jpg&ixlib=php-3.1.0&q=80&usm=15&vib=3&w=1300&s=99c1e8ec92a449794a08589bee35a2dc');">

            <div class="box1">
                <h1>Bem Vindo</h1>
                <form action="menuInicial.php" method="POST">
                    <input type="text" placeholder="E-mail" name="email" id="email" required><br>

                    <input type="password" placeholder="Senha" name="senha" id="senha" required> <br>
                    <input  type="submit" value="Login" > <br>

                </form>
                <input type="checkbox" checked="checked"> Manter conectado <br>
                    Esqueceu a<a href="#"> senha? </a> <br>
                    <a href="cadastro.php">Não tenho conta</a>
            </div>
        </div>
    </body>
</html>
