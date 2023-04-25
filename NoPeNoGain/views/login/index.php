<?php

session_start();
require_once('../../config/Conexao.php');
require_once('../../dao/ProdutoDao.php');
require_once('../../model/Produto.php');

    //instancia as classes
    $conexao = Conexao::getConexao();
    $produto = new Produto();
    $produtodao = new ProdutoDao();


?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script><!-- Bootstrap -->
        
        <!-- Script e CSS da página-->
        <link rel="stylesheet" href="index.css">
        <script src="index.js"></script>
        <!-- Script e CSS da página-->
        <title> Cadastre-se </title>

        <!-- FONT AWESOME -->
        <script src="https://kit.fontawesome.com/2db99d343f.js" crossorigin="anonymous"></script>
        <!-- FONT AWESOME -->

        <!-- AOS ANIMATE -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <!-- AOS ANIMATE -->
    </head>
        
        <body>

            <main>
                    <article class="col-12 col-sm-12 col-md-12 col-xl-8 " id="ilustrate_article"> 
                    </article>
        
            <article class="col-12 col-sm-12 col-md-12 col-xl-4" id="cadastro_article"> 

                <div id="welcome_text">
                    <p class="col-12 title_font" data-aos="zoom-in" data-aos-duration="1000" > Seja Bem Vindo(a) </p>
                    <p class="col-12 subtitle_font" data-aos="zoom-in" data-aos-duration="1300" > Nós somos a NoPeNoGain </p>
                </div>

                <div class="justify-content-center col-12" id="test">
                    <form action='../../../NoPeNoGain/controller/UsuarioController.php' method='post' name='login' onsubmit="return validar_login()">
                        <label id="error_01" class="col-12 error_font"> * Insira seu email. </label>
                        <input class="col-6" type="email" name="email_login_usuario" id="email_login_usuario" placeholder="Insira seu email:">
                        
                        <label id="error_02" class="col-12 error_font"> * Insira sua senha. </label>
                        <input class="col-6" type="password" name="senha_login_usuario" id="senha_login_usuario" placeholder="Insira sua senha: ">
                </div>

                <div class="d-flex flex-column col-12" id="botoes">
                
                    <button class="col-9" type="submit" id="login" name='login'> Fazer Login </button>
                    </form>
                
                </div>

            </article>

        </main>

    
        <script>
            AOS.init();
        </script>

        </body>

    </html>