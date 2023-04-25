<?php
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


<?php foreach($produtodao->listar() as $produto) : ?>
                       
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