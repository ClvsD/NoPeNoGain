<?php

    error_reporting(0);

    session_start();
    require_once('../../config/Conexao.php');
    require_once('../../dao/ProdutoDao.php');
    require_once('../../model/Produto.php');

        //instancia as classes
        $conexao = Conexao::getConexao();
        $produto = new Produto();
        $produtodao = new ProdutoDao();

        $esconder = $_POST['esconder'];

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
                    
                    <div class="col-12 col-lg-12 titulo_atual"> <label> Listagem de produtos! </label> </div>
                </section>
                    
                
                <!-- Estrutura diferente da página se inicia aqui -->
                <div id="campoDeBusca" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <form action="';?> <?php echo $_SERVER['PHP_SELF']; ?> <?php echo '" method="post" name="">
                    <input type="number" name="esconder" value="1" hidden>
                    <input id="input_buscarNome" class="col-9 col-sm-9 col-md-8  col-xl-8" type="text"  placeholder="Digite o nome do modelo do seu calçado" name="busca_modelo">
                    <button id="search_button" class="col-2 col-sm-2 col-md-2 col-xl-2" type="submit" > Buscar </button>
                    </form>

                    <!-- Daqui pra frente é só pra trás -->

                    <section id="filtros" class="col-12">
                        

                        <div class="dropdown dropdown-fix">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Marca
                            </button>
                            <form action="';?> <?php echo $_SERVER['PHP_SELF']; ?> <?php echo '" method="post" name="">
                            <input type="number" name="esconder" value="1" hidden>
                            <ul class="dropdown-menu overflow-filter">
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Adidas" type="radio" value="Adidas" for="Adidas"> Adidas  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Altra" type="radio" value="Altra" for="Altra"> Altra  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Anacapri" type="radio" value="Anacapri" for="Anacapri"> Anacapri  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Asics" type="radio" value="Asics" for="Asics"> Asics  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Badaba" type="radio" value="Badabá" for="Badabá"> Badabá  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Bidi" type="radio" value="Bidi" for="Bidi"> Bidi  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Bottero" type="radio" value="Bottero" for="Bottero"> Bottero  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Cartago" type="radio" value="Cartago" for="Cartago"> Cartago  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Coca-Cola" type="radio" value="Coca-Cola" for="Coca-Cola"> Coca-Cola  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Conectwalkshoes" type="radio" value="Conectwalkshoes" for="Conectwalkshoes"> Conectwalkshoes  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Converse" type="radio" value="Converse" for="Converse"> Converse  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Crocs" type="radio" value="Crocs" for="Crocs"> Crocs  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Dakota" type="radio" value="Dakota" for="Dakota"> Dakota  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Disney" type="radio" value="Disney" for="Disney"> Disney  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Donale" type="radio" value="Donale" for="Donale"> Donale  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="EUROFLEX" type="radio" value="EURO FLEX" for="EURO FLEX"> EURO FLEX  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Ferracini" type="radio" value="Ferracini" for="Ferracini"> Ferracini  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Gatatuya" type="radio" value="Gatatuya" for="Gatatuya"> Gatatuya  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Grenade" type="radio" value="Grenade" for="Grenade"> Grenade  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Griffe" type="radio" value="Griffe" for="Griffe"> Griffe  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Kurz" type="radio" value="Kurz" for="Kurz"> Kurz  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Lacoste" type="radio" value="Lacoste" for="Lacoste"> Lacoste  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="LamarcaShoes" type="radio" value="Lamarca Shoes" for="Lamarca Shoes"> Lamarca Shoes  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="LR" type="radio" value="LR" for="LR"> LR  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Lumiss" type="radio" value="Lumiss" for="Lumiss"> Lumiss  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="ManozinhosBaby" type="radio" value="Manozinhos Baby" for="Manozinhos Baby"> Manozinhos Baby  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="MeninaFashion" type="radio" value="Menina Fashion" for="Menina Fashion"> Menina Fashion  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Mizuno" type="radio" value="Mizuno" for="Mizuno"> Mizuno  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Molekinha" type="radio" value="Molekinha" for="Molekinha"> Molekinha  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="NewBalance" type="radio" value="New Balance" for="New Balance"> New Balance  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Nike" type="radio" value="Nike" for="Nike"> Nike  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Oakley" type="radio" value="Oakley" for="Oakley"> Oakley  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Olympikus" type="radio" value="Olympikus" for="Olympikus"> Olympikus  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Pampili" type="radio" value="Pampili" for="Pampili"> Pampili  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Pegada" type="radio" value="Pegada" for="Pegada"> Pegada  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Pemania" type="radio" value="Pemania" for="Pemania"> Pemania  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="PoloJoy" type="radio" value="Polo Joy" for="Polo Joy"> Polo Joy  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="POLOPLUS" type="radio" value="POLO PLUS" for="POLO PLUS"> POLO PLUS  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Puma" type="radio" value="Puma" for="Puma"> Puma  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Ramarim" type="radio" value="Ramarim" for="Ramarim"> Ramarim  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Redley" type="radio" value="Redley" for="Redley"> Redley  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Reserva" type="radio" value="Reserva" for="Reserva"> Reserva  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Salomon" type="radio" value="Salomon" for="Salomon"> Salomon  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="SantaLolla" type="radio" value="Santa Lolla" for="Santa Lolla"> Santa Lolla  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Schiareli" type="radio" value="Schiareli" for="Schiareli"> Schiareli  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="SevenBrasil" type="radio" value="Seven Brasil" for="Seven Brasil"> Seven Brasil  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Shoestock" type="radio" value="Shoestock" for="Shoestock"> Shoestock  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="ValentinaK" type="radio" value="Valentina K" for="Valentina K"> Valentina K  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Vans" type="radio" value="Vans" for="Vans"> Vans  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="ViaUno" type="radio" value="Via Uno" for="Via Uno"> Via Uno  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Vilejack" type="radio" value="Vilejack" for="Vilejack"> Vilejack  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_marca" id="Vizzano" type="radio" value="Vizzano" for="Vizzano"> Vizzano  </label></li>
                                <div class="d-flex justify-content-center mt-3 mb-1">
                                    <button class="btn btn-outline-success ps-5 pe-5" type="submit" > Filtrar </button>   
                                </div>
                            </ul>
                            </form>
                          </div>

                          <div class="dropdown dropdown-fix">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Tipo
                            </button>
                            <form action="';?> <?php echo $_SERVER['PHP_SELF']; ?> <?php echo '" method="post" name="">
                            <ul class="dropdown-menu overflow-filter">
                            <li><label class="dropdown-item" ><input name="busca_tipo" type="radio" value="Bota" /> Bota </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tipo" type="radio" value="Chinelo" /> Chinelo </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tipo" type="radio" value="Chuteira" /> Chuteira </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tipo" type="radio" value="Coturno" /> Coturno </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tipo" type="radio" value="Crocs" /> Crocs </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tipo" type="radio" value="Loafer" /> Loafer </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tipo" type="radio" value="Mocassim" /> Mocassim </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tipo" type="radio" value="Rasteira" /> Rasteira </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tipo" type="radio" value="Salto" /> Salto </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tipo" type="radio" value="Sandália" /> Sandália </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tipo" type="radio" value="Sapatênis" /> Sapatênis </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tipo" type="radio" value="Sapatilha" /> Sapatilha </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tipo" type="radio" value="Sapatinho" /> Sapatinho </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tipo" type="radio" value="Sapato" /> Sapato </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tipo" type="radio" value="Scarpin" /> Scarpin </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tipo" type="radio" value="Slip" /> Slip </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tipo" type="radio" value="Tênis" /> Tênis </label></li>
                                  <div class="d-flex justify-content-center mt-3 mb-1">
                                  <input type="number" name="esconder" value="1" hidden>
                                      <button class="btn btn-outline-success ps-5 pe-5" type="submit"> Filtrar </button>
                                  </div>
                            </ul>
                            </form>
                          </div>                          

                          <div class="dropdown dropdown-fix">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Valor
                            </button>
                            <form action="';?> <?php echo $_SERVER['PHP_SELF']; ?> <?php echo '" method="post" name="">
                            <ul class="dropdown-menu overflow-filter">
                            <li><label class="dropdown-item" ><input name="busca_valor" id="" type="radio" value="0" for="Valor maior que R$0,00"> Valor maior que R$0,00  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_valor" id="" type="radio" value="50" for="Valor maior que R$50,00"> Valor maior que R$50,00  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_valor" id="" type="radio" value="100" for="Valor maior que R$100,00"> Valor maior que R$100,00  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_valor" id="" type="radio" value="200" for="Valor maior que R$200,00"> Valor maior que R$200,00  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_valor" id="" type="radio" value="300" for="Valor maior que R$300,00"> Valor maior que R$300,00  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_valor" id="" type="radio" value="400" for="Valor maior que R$400,00"> Valor maior que R$400,00  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_valor" id="" type="radio" value="500" for="Valor maior que R$500,00"> Valor maior que R$500,00  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_valor" id="" type="radio" value="600" for="Valor maior que R$600,00"> Valor maior que R$600,00  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_valor" id="" type="radio" value="700" for="Valor maior que R$700,00"> Valor maior que R$700,00  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_valor" id="" type="radio" value="800" for="Valor maior que R$800,00"> Valor maior que R$800,00  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_valor" id="" type="radio" value="900" for="Valor maior que R$900,00"> Valor maior que R$900,00  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_valor" id="" type="radio" value="1000" for="Valor maior que R$1000,00"> Valor maior que R$1000,00  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_valor" id="" type="radio" value="2000" for="Valor maior que R$2000,00"> Valor maior que R$2000,00  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_valor" id="" type="radio" value="3000" for="Valor maior que R$3000,00"> Valor maior que R$3000,00  </label></li>
                                  <div class="d-flex justify-content-center mt-3 mb-1">
                                    <input type="number" name="esconder" value="1" hidden>
                                      <button class="btn btn-outline-success ps-5 pe-5" type="submit"> Filtrar </button>
                                  </div>
                            </ul>
                            </form>
                          </div>

                          <div class="dropdown dropdown-fix">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Tamanho
                            </button>
                            <form action="';?> <?php echo $_SERVER['PHP_SELF']; ?> <?php echo '" method="post" name="">
                            <ul class="dropdown-menu overflow-filter">
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="20" /> 20 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="21" /> 21 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="22" /> 22 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="23" /> 23 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="24" /> 24 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="25" /> 25 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="26" /> 26 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="27" /> 27 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="28" /> 28 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="29" /> 29 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="30" /> 30 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="31" /> 31 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="32" /> 32 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="33" /> 33 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="34" /> 34 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="35" /> 35 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="36" /> 36 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="37" /> 37 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="38" /> 38 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="39" /> 39 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="40" /> 40 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="41" /> 41 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="42" /> 42 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="43" /> 43 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="44" /> 44 </label></li>
                            <li><label class="dropdown-item" ><input name="busca_tamanho" type="radio" value="45" /> 45 </label></li>
                                  <div class="d-flex justify-content-center mt-3 mb-1">
                                  <input type="number" name="esconder" value="1" hidden>
                                      <button class="btn btn-outline-success ps-5 pe-5" type="submit"> Filtrar </button>
                                  </div>
                            </ul>
                            </form>
                          </div>


                          <div class="dropdown dropdown-fix">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Estoque
                            </button>
                            <form action="';?> <?php echo $_SERVER['PHP_SELF']; ?> <?php echo '" method="post" name="">
                            <ul class="dropdown-menu">
                            <li><label class="dropdown-item" ><input name="busca_quantidade" id="" type="radio" value="cresc" for="Menor para maior"> Menor para maior  </label></li>
                            <li><label class="dropdown-item" ><input name="busca_quantidade" id="" type="radio" value="decresc" for="Maior para menor"> Maior para menor  </label></li>
                                <div class="d-flex justify-content-center mt-3 mb-1">
                                <input type="number" name="esconder" value="1" hidden>
                                    <button class="btn btn-outline-success ps-5 pe-5" type="submit"> Filtrar </button>
                                </div>
                            </ul>
                            </form>
                          </div>

                          <div class="dropdown dropdown-fix">
                          <form action="';?> <?php echo $_SERVER['PHP_SELF']; ?> <?php echo '" method="post" name="">
                          <input type="number" name="esconder" value="0" hidden>
                          <button class="btn btn-outline-secondary " type="submit"> Remover Filtros </button>
                          </form>
                          </div>

                    </section>
                      

                    <!-- Daqui pra tras é só pra frente -->
                </div>
                <div class="col-11 col-sm-11 col-xl-11" id="container_busca">';
?>
                <?php if($esconder != 1) { include '../lista/lista.php'; }?>



    <?php foreach($produtodao->ListagemMarca() as $produto) : ?>

                   
                   <!-- Container para FOREACH @das informações dos calçados -->
                   <section class="col-12 div_listagem d-flex flex-wrap">
                       <div class="col-xl-12 borda"> 
                           <label class="titulo_listagem"> 
                               <i class="fa-solid fa-award"></i> Modelo: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getModelo(); ?> </label> 
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-tag"></i> Marca: </label>
                           <label class="valor_listagem"> <?php echo $produto->getMarca(); ?></label>
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-truck-ramp-box"></i> Quantidade no Estoque: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getQuantidade(); ?></label>
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-shoe-prints"></i> Tipo: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getTipo(); ?></label> 
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-tags"></i> Tamanho: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getTamanho(); ?></label> 
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-regular fa-money-bill-1"></i> Valor Unitário: </label>
                           <label class="valor_listagem"> <?php echo $produto->getValorUnit(); ?></label>
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-hand-holding-dollar"></i> Valor Total: </label>
                           <label class="valor_listagem"> <?php echo $produto->getValorTotal(); ?></label> 
                       </div>

                       
                       <form action="../excluir_produto/index.php" method="post"> 
                       <div class="col-xl-6 col-12 borda botoes_del_upd"> 
                                <input type="number" name="excluir" value="<?php echo $produto->getID()?>" hidden>
                                <button type="submit" class="col-1 delete_button btn btn-outline-danger"> <i class="fa-solid fa-trash"></i> </button>
                        </form>
                        
                            <form action="../alterar_produto/index.php" method="post">
                                    <input type="number" name="excluir" value="<?php echo $produto->getID()?>" hidden>
                                    <button type="submit" class="col-1 update_button btn btn-outline-warning"> <i class="fa-solid fa-pen"></i> </button>
                            </form>
                       </div>
                   </section>
               <!-- Container das informações dos calçados -->

    <?php endforeach?>



    <?php foreach($produtodao->ListagemModelo() as $produto) : ?>

                   
                   <!-- Container para FOREACH @das informações dos calçados -->
                   <section class="col-12 div_listagem d-flex flex-wrap">
                       <div class="col-xl-12 borda"> 
                           <label class="titulo_listagem"> 
                               <i class="fa-solid fa-award"></i> Modelo: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getModelo(); ?> </label> 
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-tag"></i> Marca: </label>
                           <label class="valor_listagem"> <?php echo $produto->getMarca(); ?></label>
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-truck-ramp-box"></i> Quantidade no Estoque: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getQuantidade(); ?></label>
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-shoe-prints"></i> Tipo: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getTipo(); ?></label> 
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-tags"></i> Tamanho: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getTamanho(); ?></label> 
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-regular fa-money-bill-1"></i> Valor Unitário: </label>
                           <label class="valor_listagem"> <?php echo $produto->getValorUnit(); ?></label>
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-hand-holding-dollar"></i> Valor Total: </label>
                           <label class="valor_listagem"> <?php echo $produto->getValorTotal(); ?></label> 
                       </div>
                       <div class="col-xl-6 col-12 borda botoes_del_upd"> 
                            <form action="../excluir_produto/index.php" method="post"> 
                                <input type="number" name="excluir" value="<?php echo $produto->getID()?>" hidden>
                                <button type="submit" class="col-1 delete_button btn btn-outline-danger"> <i class="fa-solid fa-trash"></i> </button>
                            </form>
                            <form action="../alterar_produto/index.php" method="post">
                                    <input type="number" name="excluir" value="<?php echo $produto->getID()?>" hidden>
                                    <button type="submit" class="col-1 update_button btn btn-outline-warning"> <i class="fa-solid fa-pen"></i> </button>
                            </form>
                       </div>
                   </section>
               <!-- Container das informações dos calçados -->




    <?php endforeach?>

    

    <?php foreach($produtodao->ListagemValorUnitario() as $produto) : ?>

                   
                   <!-- Container para FOREACH @das informações dos calçados -->
                   <section class="col-12 div_listagem d-flex flex-wrap">
                       <div class="col-xl-12 borda"> 
                           <label class="titulo_listagem"> 
                               <i class="fa-solid fa-award"></i> Modelo: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getModelo(); ?> </label> 
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-tag"></i> Marca: </label>
                           <label class="valor_listagem"> <?php echo $produto->getMarca(); ?></label>
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-truck-ramp-box"></i> Quantidade no Estoque: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getQuantidade(); ?></label>
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-shoe-prints"></i> Tipo: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getTipo(); ?></label> 
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-tags"></i> Tamanho: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getTamanho(); ?></label> 
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-regular fa-money-bill-1"></i> Valor Unitário: </label>
                           <label class="valor_listagem"> <?php echo $produto->getValorUnit(); ?></label>
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-hand-holding-dollar"></i> Valor Total: </label>
                           <label class="valor_listagem"> <?php echo $produto->getValorTotal(); ?></label> 
                       </div>
                       <div class="col-xl-6 col-12 borda botoes_del_upd"> 
                            <form action="../excluir_produto/index.php" method="post"> 
                                <input type="number" name="excluir" value="<?php echo $produto->getID()?>" hidden>
                                <button type="submit" class="col-1 delete_button btn btn-outline-danger"> <i class="fa-solid fa-trash"></i> </button>
                            </form>
                            <form action="../alterar_produto/index.php" method="post">
                                    <input type="number" name="excluir" value="<?php echo $produto->getID()?>" hidden>
                                    <button type="submit" class="col-1 update_button btn btn-outline-warning"> <i class="fa-solid fa-pen"></i> </button>
                            </form>
                       </div>
                   </section>
               <!-- Container das informações dos calçados -->




<?php endforeach?>






                   

<?php foreach($produtodao->ListagemTamanho() as $produto) : ?>

                   <!-- Container para FOREACH @das informações dos calçados -->
                   <section class="col-12 div_listagem d-flex flex-wrap">
                       <div class="col-xl-12 borda"> 
                           <label class="titulo_listagem"> 
                               <i class="fa-solid fa-award"></i> Modelo: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getModelo(); ?> </label> 
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-tag"></i> Marca: </label>
                           <label class="valor_listagem"> <?php echo $produto->getMarca(); ?></label>
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-truck-ramp-box"></i> Quantidade no Estoque: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getQuantidade(); ?></label>
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-shoe-prints"></i> Tipo: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getTipo(); ?></label> 
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-tags"></i> Tamanho: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getTamanho(); ?></label> 
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-regular fa-money-bill-1"></i> Valor Unitário: </label>
                           <label class="valor_listagem"> <?php echo $produto->getValorUnit(); ?></label>
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-hand-holding-dollar"></i> Valor Total: </label>
                           <label class="valor_listagem"> <?php echo $produto->getValorTotal(); ?></label> 
                       </div>
                       <div class="col-xl-6 col-12 borda botoes_del_upd"> 
                            <form action="../excluir_produto/index.php" method="post"> 
                                <input type="number" name="excluir" value="<?php echo $produto->getID()?>" hidden>
                                <button type="submit" class="col-1 delete_button btn btn-outline-danger"> <i class="fa-solid fa-trash"></i> </button>
                            </form>
                           <form action="../alterar_produto/index.php" method="post">
                                    <input type="number" name="excluir" value="<?php echo $produto->getID()?>" hidden>
                                    <button type="submit" class="col-1 update_button btn btn-outline-warning"> <i class="fa-solid fa-pen"></i> </button>
                            </form>
                       </div>
                   </section>
               <!-- Container das informações dos calçados -->




<?php endforeach?>







<?php foreach($produtodao->ListagemTipo() as $produto) : ?>

                   
                   <!-- Container para FOREACH @das informações dos calçados -->
                   <section class="col-12 div_listagem d-flex flex-wrap">
                       <div class="col-xl-12 borda"> 
                           <label class="titulo_listagem"> 
                               <i class="fa-solid fa-award"></i> Modelo: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getModelo(); ?> </label> 
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-tag"></i> Marca: </label>
                           <label class="valor_listagem"> <?php echo $produto->getMarca(); ?></label>
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-truck-ramp-box"></i> Quantidade no Estoque: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getQuantidade(); ?></label>
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-shoe-prints"></i> Tipo: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getTipo(); ?></label> 
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-tags"></i> Tamanho: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getTamanho(); ?></label> 
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-regular fa-money-bill-1"></i> Valor Unitário: </label>
                           <label class="valor_listagem"> <?php echo $produto->getValorUnit(); ?></label>
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-hand-holding-dollar"></i> Valor Total: </label>
                           <label class="valor_listagem"> <?php echo $produto->getValorTotal(); ?></label> 
                       </div>
                       <div class="col-xl-6 col-12 borda botoes_del_upd"> 
                            <form action="../excluir_produto/index.php" method="post"> 
                                <input type="number" name="excluir" value="<?php echo $produto->getID()?>" hidden>
                                <button type="submit" class="col-1 delete_button btn btn-outline-danger"> <i class="fa-solid fa-trash"></i> </button>
                            </form>
                           <form action="../alterar_produto/index.php" method="post">
                                    <input type="number" name="excluir" value="<?php echo $produto->getID()?>" hidden>
                                    <button type="submit" class="col-1 update_button btn btn-outline-warning"> <i class="fa-solid fa-pen"></i> </button>
                            </form>
                       </div>
                   </section>
               <!-- Container das informações dos calçados -->




<?php endforeach?>





<?php foreach($produtodao->ListagemQuantidade() as $produto) : ?>

                   
                   <!-- Container para FOREACH @das informações dos calçados -->
                   <section class="col-12 div_listagem d-flex flex-wrap">
                       <div class="col-xl-12 borda"> 
                           <label class="titulo_listagem"> 
                               <i class="fa-solid fa-award"></i> Modelo: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getModelo(); ?> </label> 
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-tag"></i> Marca: </label>
                           <label class="valor_listagem"> <?php echo $produto->getMarca(); ?></label>
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-truck-ramp-box"></i> Quantidade no Estoque: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getQuantidade(); ?></label>
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-shoe-prints"></i> Tipo: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getTipo(); ?></label> 
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-tags"></i> Tamanho: </label> 
                           <label class="valor_listagem"> <?php echo $produto->getTamanho(); ?></label> 
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-regular fa-money-bill-1"></i> Valor Unitário: </label>
                           <label class="valor_listagem"> <?php echo $produto->getValorUnit(); ?></label>
                       </div>
                       <div class="col-xl-6 borda"> 
                           <label class="titulo_listagem"> <i class="fa-solid fa-hand-holding-dollar"></i> Valor Total: </label>
                           <label class="valor_listagem"> <?php echo $produto->getValorTotal(); ?></label> 
                       </div>
                       <div class="col-xl-6 col-12 borda botoes_del_upd"> 
                            <form action="../excluir_produto/index.php" method="post"> 
                                <input type="number" name="excluir" value="<?php echo $produto->getID()?>" hidden>
                                <button type="submit" class="col-1 delete_button btn btn-outline-danger"> <i class="fa-solid fa-trash"></i> </button>
                            </form>
                           <form action="../alterar_produto/index.php" method="post">
                                    <input type="number" name="excluir" value="<?php echo $produto->getID()?>" hidden>
                                    <button type="submit" class="col-1 update_button btn btn-outline-warning"> <i class="fa-solid fa-pen"></i> </button>
                            </form>
                       </div>
                   </section>
               <!-- Container das informações dos calçados -->




<?php endforeach?>




<?php echo'
                </div>      
            </article>
        </main>

        <script>
            AOS.init();
        </script>

    </body>

</html>'

?>