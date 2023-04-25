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
    <link rel="stylesheet" href="index_alterar.css">
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
                
            
                <div class="col-lg-12" id="div_alterar"> <i class="fa-solid fa-align-left"></i> <label> <button name="alterar" class="invisible_submit_button"> Alterar Produtos </button> </label> </div>
        
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
                            <li><a class="dropdown-item h4" onclick="Return_ListarProduto()"> <button type="submit" name="listar" class="invisible_submit_button"> Listar Produtos </button> </a></li>
                        </form>
                        
                        <form action="../../views/cadastre_produto" method="get" name="cadastre">
                            <li><a class="dropdown-item h4" onclick="Return_cadastrarProduto()"> <button type="submit" name="listar" class="invisible_submit_button"> Cadastrar Produtos </button> </a></li>
                        </form>


                    </ul>
                </div>
            </section>
                    
                    <div class="col-12 col-lg-12 titulo_atual"> <label> Altere um produto! </label> </div>
                
                
                </section>';
?>
                <?php foreach($produtodao->Listagem() as $produto) : ?>
                <form action='../../controller/ProdutoController.php' method='post' name='alterar'>
                <section class="col-12 col-sm-12 col-lg-12" id="conteudo_cadastro">
                    <div class="cadastro_div">
                        <label class="titulos_form"> Modelo: </label>
                        <input class="col-8 col-sm-10 col-lg-10" id="input_modelo" type="text" name="modelo" placeholder="<?php echo $produto->getModelo()?>">
                    </div>

                    <div class="cadastro_div">
                        <label class="titulos_form"> Marca: </label>
                        <select class="col-8 col-sm-10 col-lg-4" id="input_marca" class="form-control" name="marca" >
                            <option class="h6" value=""> <?php echo $produto->getMarca()?> </option>
                            <option class="h6" value="Adidas"> Adidas </option>
                            <option class="h6" value="Altra"> Altra </option>
                            <option class="h6" value="Anacapri"> Anacapri </option>
                            <option class="h6" value="Asics"> Asics </option>
                            <option class="h6" value="Badabá"> Badabá </option>
                            <option class="h6" value="Bidi"> Bidi </option>
                            <option class="h6" value="Bottero"> Bottero </option>
                            <option class="h6" value="Cartago"> Cartago </option>
                            <option class="h6" value="Coca-Cola"> Coca-Cola </option>
                            <option class="h6" value="Conectwalkshows"> Conectwalkshows </option>
                            <option class="h6" value="Converse"> Converse </option>
                            <option class="h6" value="Crocs"> Crocs </option>
                            <option class="h6" value="Dakota"> Dakota </option>
                            <option class="h6" value="Disney"> Disney </option>
                            <option class="h6" value="Donale"> Donale </option>
                            <option class="h6" value="EURO FLEX"> EURO FLEX </option>
                            <option class="h6" value="Ferracini"> Ferracini </option>
                            <option class="h6" value="Gatatuya"> Gatatuya </option>
                            <option class="h6" value="Grenade"> Grenade </option>
                            <option class="h6" value="Griffe"> Griffe </option>
                            <option class="h6" value="Kurz"> Kurz </option>
                            <option class="h6" value="Lacoste"> Lacoste </option>
                            <option class="h6" value="Lamarca Shoes"> Lamarca Shoes </option>
                            <option class="h6" value="LR"> LR </option>
                            <option class="h6" value="Lumiss"> Lumiss </option>
                            <option class="h6" value="Manozinhos Baby"> Manozinhos Baby </option>
                            <option class="h6" value="Menina Fashion"> Menina Fashion </option>
                            <option class="h6" value="Mizunh"> Mizunh </option>
                            <option class="h6" value="Molekinha"> Molekinha </option>
                            <option class="h6" value="New Balance"> New Balance </option>
                            <option class="h6" value="Nike"> Nike </option>
                            <option class="h6" value="Oakley"> Oakley </option>
                            <option class="h6" value="Olympikus"> Olympikus </option>
                            <option class="h6" value="Pampili"> Pampili </option>
                            <option class="h6" value="Pegada"> Pegada </option>
                            <option class="h6" value="Pemania"> Pemania </option>
                            <option class="h6" value="Polo Joy"> Polo Joy </option>
                            <option class="h6" value="POLO PLUS"> POLO PLUS </option>
                            <option class="h6" value="Puma"> Puma </option>
                            <option class="h6" value="Ramarim"> Ramarim </option>
                            <option class="h6" value="Redley"> Redley </option>
                            <option class="h6" value="Reserva"> Reserva </option>
                            <option class="h6" value="Salomon"> Salomon </option>
                            <option class="h6" value="Santa Lolla"> Santa Lolla </option>
                            <option class="h6" value="Schiareli"> Schiareli </option>
                            <option class="h6" value="Seven Brasil"> Seven Brasil </option>
                            <option class="h6" value="Shoestock"> Shoestock </option>
                            <option class="h6" value="Valentina K"> Valentina K </option>
                            <option class="h6" value="Vans"> Vans </option>
                            <option class="h6" value="Via Uno"> Via Uno </option>
                            <option class="h6" value="Vilejack"> Vilejack </option>
                            <option class="h6" value="Vizzano"> Vizzano </option>
                        </select>

                        <label class="titulos_form"> Tamanho: </label>
                        <select class="col-7 col-sm-9 col-lg-4" id="input_tamanho" class="form-control" name="tamanho">
                            <option class="h6" value=""> <?php echo $produto->getTamanho()?> </option>
                            <option class="h6" value="35"> 20 </option>
                            <option class="h6" value="36"> 21 </option>
                            <option class="h6" value="37"> 22 </option>
                            <option class="h6" value="38"> 23 </option>
                            <option class="h6" value="39"> 24 </option>
                            <option class="h6" value="40"> 25 </option>
                            <option class="h6" value="41"> 26 </option>
                            <option class="h6" value="42"> 27 </option>
                            <option class="h6" value="43"> 28 </option>
                            <option class="h6" value="44"> 29 </option>
                            <option class="h6" value="45"> 30 </option>
                            <option class="h6" value="46"> 31 </option>
                            <option class="h6" value="47"> 32 </option>
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
                        </select>
                    </div>

                    <div class="cadastro_div">
                        <label class="titulos_form"> Quantidade: </label>
                        <input class="col-6 col-sm-9 col-lg-3 col-xl-3" id="input_quantidade" type="number" min="1" name="quantidade" placeholder="<?php echo $produto->getQuantidade()?>">

                        
                        <label class="titulos_form"> Tipo: </label>
                        <select class="col-8 col-sm-10 col-lg-2 col-xl-3" id="input_tipo" class="form-control" name="tipo">
                            <option class="h6" value=""> <?php echo $produto->getTipo()?> </option>
                            <option class="h6" value="Bota"> Bota </option>
                            <option class="h6" value="Chinelo"> Chinelo </option>
                            <option class="h6" value="Chuteira"> Chuteira </option>
                            <option class="h6" value="Crocs"> Crocs </option>
                            <option class="h6" value="Loafer"> Loafer </option>
                            <option class="h6" value="Mocassim"> Mocassim </option>
                            <option class="h6" value="Rasteira"> Rasteira </option>
                            <option class="h6" value="Salto"> Salto </option>
                            <option class="h6" value="Sandália"> Sandália </option>
                            <option class="h6" value="Sapatilha"> Sapatilha </option>
                            <option class="h6" value="Sapatênis"> Sapatênis </option>
                            <option class="h6" value="Sapatinho"> Sapatinho </option>
                            <option class="h6" value="Sapato"> Sapato </option>
                            <option class="h6" value="Scarpin"> Scarpin </option>
                            <option class="h6" value="Slip"> Slip </option>
                            <option class="h6" value="Tênis"> Tênis </option>
                        </select>
                    </div>

                    <div class="cadastro_div">
                        <label class="titulos_form"> Valor Unitário: </label>
                        <input class="col-5 col-sm-8 col-lg-3" id="input_valorUnitario" type="number" step="0.01" name="valor_unitario" placeholder="<?php echo $produto->getValorUnit()?>">


                        <label class="titulos_form"> Valor Total: </label>
                        

                            <input type="text" value="1" name="valor_total" hidden>
                        <input class="col-7 col-sm-9 col-lg-4" id="input_valorTotal" type="number"  placeholder="<?php echo $produto->getValorTotal()?>" disabled value="">
                    </div>
                       
                    <div class="d-flex align-items-end justify-content-end" id="botoes_div">
                    <input type="number" value="<?php echo $produto->getID() ?>" name="id_alter" hidden>
                        <button type="submit" class="col-10 col-sm-10 col-lg-3" id="confirmar_cadastro_produto" name='alterar'> Alterar </button>
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