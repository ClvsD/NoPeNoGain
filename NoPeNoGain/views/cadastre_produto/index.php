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
                            <li><a class="dropdown-item h4" onclick="Return_ListarProduto()"> <button type="submit" name="logout" class="invisible_submit_button"> Listar Produtos </button> </a></li>
                        </form>

                        <form action="../../views/cadastre_produto" method="get" name="cadastre">
                            <li><a class="dropdown-item h4" onclick="Return_cadastrarProduto()"> <button type="submit" name="logout" class="invisible_submit_button"> Cadastrar Produtos </button> </a></li>
                        </form>
                        
                    </ul>
                </div>
            </section>
                    
                    <div class="col-12 col-lg-12 titulo_atual"> <label> Cadastre um produto! </label> </div>
                
                
                </section>

                <form action='../../../DailyWrite/controller/ProdutoController.php' method='post' name='cadastrar'>
                <section class="col-12 col-sm-12 col-lg-12" id="conteudo_cadastro">
                    <div class="cadastro_div">
                        <label class="titulos_form"> Modelo: </label>
                        <input class="col-8 col-sm-10 col-lg-10" id="input_modelo" type="text" name="modelo" placeholder="Nome do modelo, Gênero, Cor">
                    </div>

                    <div class="cadastro_div">
                        <label class="titulos_form"> Marca: </label>
                        <select class="col-8 col-sm-10 col-lg-4" id="input_marca" class="form-control" name="marca">
                            <option class="h6" value=""> Selecione uma marca </option>
                            <option class="h6" value="Nike" > Nike </option>
                            <option class="h6" value="Adidas"> Adidas </option>
                            <option class="h6" value="Mizuno"> Mizuno </option>
                            <option class="h6" value="Olympikus"> Olympikus </option>
                            <option class="h6" value="Converse"> Converse </option>
                            <option class="h6" value="Vans"> Vans </option>
                            <option class="h6" value="Puma"> Puma </option>
                            <option class="h6" value="Asics"> Asics </option>
                            <option class="h6" value="Havainas"> Havaianas </option>
                            <option class="h6" value="Schuts"> Schuts </option>
                            <option class="h6" value="Arezzo"> Arezzo </option>
                            <option class="h6" value="Melissa"> Melissa </option>
                            <option class="h6" value="Colcci"> Colcci </option>
                            <option class="h6" value="Jorge Bischoff"> Jorge Bischoff </option>
                            <option class="h6" value="Santa Lolla"> Santa Lolla </option>
                            <option class="h6" value="UnderArmour"> UnderArmour </option>
                        </select>

                        <label class="titulos_form"> Tamanho: </label>
                        <select class="col-7 col-sm-9 col-lg-4" id="input_tamanho" class="form-control" name="tamanho">
                            <option class="h6" value=""> Selecione um tamanho </option>
                            <option class="h6" value="33"> 33 </option>
                            <option class="h6" value="34"> 34 </option>
                            <option class="h6" value="35"> 35 </option>
                            <option class="h6" value="36"> 36 </option>
                            <option class="h6" value="37"> 37 </option>
                            <option class="h6" value="38"> 38 </option>
                            <option class="h6" value="39"> 39 </option>
                            <option class="h6" value="40"> 40 </option>
                            <option class="h6" value="41"> 41 </option>
                            <option class="h6" value="42"> 42 </option>
                            <option class="h6" value="43"> 43 </option>
                            <option class="h6" value="44"> 44 </option>
                            <option class="h6" value="45"> 45 </option>
                            <option class="h6" value="46"> 46 </option>
                            <option class="h6" value="47"> 47 </option>
                        </select>
                    </div>

                    <div class="cadastro_div">
                        <label class="titulos_form"> Quantidade: </label>
                        <input class="col-6 col-sm-9 col-lg-3 col-xl-3" id="input_quantidade" type="number" min="1" name="quantidade" placeholder="Exemplo: 99">

                        
                        <label class="titulos_form"> Tipo: </label>
                        <select class="col-8 col-sm-10 col-lg-2 col-xl-3" id="input_tipo" class="form-control" name="tipo">
                            <option class="h6" value=""> Selecione um tipo </option>
                            <option class="h6" value="Tênis"> Tênis </option>
                            <option class="h6" value="Sandálias"> Sandálias </option>
                            <option class="h6" value="Chinelos"> Chinelos </option>
                            <option class="h6" value="Botas"> Botas </option>
                            <option class="h6" value="Sapatos de alto"> Sapatos de salto alto </option>
                            <option class="h6" value="Sapatos de baixo"> Sapatos de salto baixo </option>
                            <option class="h6" value="Sapatilhas"> Sapatilhas </option>
                            <option class="h6" value="Sapatos sociais"> Sapatos sociais </option>
                            <option class="h6" value="Sapatos de couro"> Sapatos de couro </option>
                            <option class="h6" value="Sapatos de caminhada"> Sapatos de caminhada </option>
                            <option class="h6" value="Sapatos de corrida"> Sapatos de corrida </option>
                            <option class="h6" value="Sapatos de basquete"> Sapatos de basquete </option>
                            <option class="h6" value="Sapatos de futebol"> Sapatos de futebol </option>
                            <option class="h6" value="Sapatos de golfe"> Sapatos de golfe </option>
                            <option class="h6" value="Sapatos de ciclismo"> Sapatos de ciclismo </option>
                            <option class="h6" value="Chuteiras de futebol"> Chuteiras de futebol </option>
                            <option class="h6" value="Sapatos de escalada"> Sapatos de escalada </option>
                            <option class="h6" value="Sapatênis"> Sapatênis </option>
                            <option class="h6" value="Mocassins"> Mocassins </option>
                            <option class="h6" value="Oxfords"> Oxfords </option>
                            <option class="h6" value="Slip-Ons"> Slip-Ons </option>
                            <option class="h6" value="Sapatos de plataforma"> Sapatos de plataforma </option>
                            <option class="h6" value="Clogs"> Clogs </option>
                            <option class="h6" value="Galochas"> Galochas </option>
                            <option class="h6" value="Sapatos ortopédicos."> Sapatos ortopédicos. </option>
                        </select>
                    </div>

                    <div class="cadastro_div">
                        <label class="titulos_form"> Valor Unitário: </label>
                        <input class="col-5 col-sm-8 col-lg-3" id="input_valorUnitario" type="number" step="0.01" name="valorunit" placeholder="Exemplo: 3211.30">


                        <label class="titulos_form"> Valor Total: </label>
                        

                            <input type="text" value="1" name="valortotal" hidden>
                        <input class="col-7 col-sm-9 col-lg-4" id="input_valorTotal" type="number"  placeholder="( Será Convertido após o cadastro )" disabled value="">
                    </div>
                       
                    <div class="d-flex align-items-end justify-content-end" id="botoes_div">
                        <button type="submit" class="col-10 col-sm-10 col-lg-3" id="confirmar_cadastro_produto" name='cadastrar'> Cadastrar </button>
                    </div>

                </section>
                </form>
            </article>

        </main>

        

   
        <script>
            AOS.init();
        </script>

    </body>

</html>