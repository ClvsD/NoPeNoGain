<?php 
    session_start();
    require_once('config/Conexao.php');
    require_once('dao/UsuarioDao.php');
    require_once('model/Usuario.php');

        //instancia as classes
        $conexao = Conexao::getConexao();
        $usuario = new Usuario();
        $usuariodao = new UsuarioDao();

        $login = new UsuarioDao();

        if(!$login->checkLogin()) {
            header("Location: views/login");
        }

    foreach($usuariodao->user() as $usuario) {

       if($usuario->getID() == 1 && $usuario->getNome() == "estoquista") {
            header("Location: views/listar_produto");
        } else {
            header("Location: views/login");
        } 

   }
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap -->
    
    <!-- Script e CSS da página-->
    <link rel="stylesheet" href="index.css">
    <script src="index.js"></script>
    <!-- Script e CSS da página-->
    <title> Teste foda </title>

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/2db99d343f.js" crossorigin="anonymous"></script>
    <!-- FONT AWESOME -->

    <!-- AOS ANIMATE -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- AOS ANIMATE -->
</head>
    <body>
        
    <HR>

    </body>

</html>

