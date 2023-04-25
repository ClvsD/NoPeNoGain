<?php

    session_start();
    require_once('../../config/Conexao.php');
    require_once('../../dao/ProdutoDao.php');
    require_once('../../model/Produto.php');

        //instancia as classes
        $conexao = Conexao::getConexao();
        $produto = new Produto();
        $produtodao = new ProdutoDao();


        /* Verificação de login do usuário */
        require_once('../../config/Conexao.php');
        require_once('../../dao/UsuarioDao.php');
        require_once('../../model/Usuario.php');


            $login = new UsuarioDao();
            if(!$login->checkLogin()) {
                header("Location: ../../views/login");
            }
        /* Verificação de login do usuário */


echo '

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
            <aside id="aside_opcoes" class="col-lg-3">
            <form action="../../../NoPeNoGain/controller/UsuarioController.php" method="get" name="logout">
            <div class="col-lg-12" id="div_logoff"> <i class="fa-solid fa-right-to-bracket fa-flip-horizontal"></i> <label> <button type="submit" name="logout" class="invisible_submit_button"> Deslogar </button> </label> </div>
        </form>
        
            <section id="opcoes_produtos">
            <form action="../../views/listar_produto" method="get" name="listar">
                <div class="col-lg-12" id="div_listagem"> <i class="fa-solid fa-filter"></i> <label> <button type="submit" name="listar" class="invisible_submit_button"> Listar Produtos </button> </label> </div>
            </form>

            <form action="../../views/cadastre_produto" method="get" name="cadastre">
                <div class="col-lg-12" id="div_cadastro"> <i class="fa-solid fa-pencil"></i> <label> <button type="submit" name="cadastre" class="invisible_submit_button"> Cadastrar Produtos  </button> </label> </div>
            </form>
                
                <div class="col-lg-12" id="div_excluir"> <i class="fa-solid fa-xmark"></i> <label> <button name="excluir" class="invisible_submit_button"> Excluir Produtos </button> </label> </div>
            
                </section>

            </aside id="aside_opcoes">



            





            <article class="col-12 col-sm-12 col-lg-9 col-xl-9" id="article_cadastro">

                
                <section class="col-12 col-sm-12 col-lg-12" id="header_cadastro">
                    
                    <section id="mobile_dropdown">
                <div class="dropdown">
                    <a class="btn dropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                        <i class="fa-solid fa-bars fa-xl"></i>
                    </a>
                
                    <ul class="dropdown-menu">
                    
                        <form action="../../../NoPeNoGain/controller/UsuarioController.php" method="get" name="logout">
                            <li><a class="dropdown-item h4" onclick="Return_Deslogar()"> <button type="submit" name="logout" class="invisible_submit_button">  Deslogar </button> </a> </li> 
                        </form>

                        <form action="../../views/listar_produto" method="get" name="listar">
                            <li><a class="dropdown-item h4" onclick="Return_ListarProduto()"> <button type="submit" name="logout" class="invisible_submit_button">  Listar Produtos </button> </a></li>
                        </form>
                        
                        <form action="../../views/cadastre_produto" method="get" name="cadastre">
                            <li><a class="dropdown-item h4" onclick="Return_cadastrarProduto()"> <button type="submit" name="logout" class="invisible_submit_button">  Cadastrar Produtos </button> </a></li>
                        </form>

                    </ul>
                </div>
            </section>
                    
                    <div class="col-12 col-lg-12 titulo_atual"> <label> Exclua um produto! </label> </div>
                
                
                </section>';
?>
                <?php foreach($produtodao->Listagem() as $produto) : ?>
                <form action="../../controller/ProdutoController.php" method="post" name="deletar">
                <section class="col-12 col-sm-12 col-lg-12" id="conteudo_cadastro">
                <div class="cadastro_div">
                        <label class="titulos_form"> Modelo: </label>
                        <label class="titulos_form float-end"> <?php echo $produto->getModelo(); ?> </label>
                    </div>

                    <div class="cadastro_div">
                        <label class="titulos_form"> Marca: </label>
                        <label class="titulos_form float-end"> <?php echo $produto->getMarca(); ?> </label>
                    </div>

                    <div class="cadastro_div">
                        <label class="titulos_form"> Tamanho: </label>
                        <label class="titulos_form float-end"> <?php echo $produto->getTamanho(); ?> </label>
                    </div>

                    <div class="cadastro_div">
                        <label class="titulos_form"> Quantidade: </label>
                        <label class="titulos_form float-end"> <?php echo $produto->getQuantidade(); ?> </label>
                    </div >
                    

                    <div class="cadastro_div">
                    <label class="titulos_form"> Tipo: </label>
                    <label class="titulos_form float-end"> <?php echo $produto->getTipo(); ?> </label>
                    </div>

                    <div class="cadastro_div">
                        <label class="titulos_form"> Valor Unitário: </label>
                        <label class="titulos_form float-end"> <?php echo $produto->getValorUnit(); ?> </label>
                    </div>

                    <div class="cadastro_div">
                        <label class="titulos_form"> Valor Total: </label>
                        <label class="titulos_form float-end"> <?php echo $produto->getValorTotal(); ?> </label>
                    </div>

                       
                    <div class="d-flex align-items-end justify-content-end" id="botoes_div">
                        <input type="number" name="id_del" value="<?php echo $produto->getID() ?>" hidden/>
                        <button type="submit" class="col-10 col-sm-10 col-lg-3" id="confirmar_cadastro_produto" name='deletar'> Excluir </button>
                    </div>
                </section>
                </form>
            <?php endforeach ?>
<?php echo '
            </article>

        </main>      
   
        <script>
            AOS.init();
        </script>

    </body>

</html>';

?>