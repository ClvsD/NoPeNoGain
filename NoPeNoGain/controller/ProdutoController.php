<?php

require_once('../config/Conexao.php');
require_once('../dao/ProdutoDao.php');
require_once('../model/Produto.php');

$produto = new Produto();
$produtodao = new ProdutoDao();

$dados = filter_input_array(INPUT_POST);

if(isset($_POST['cadastrar'])){

    
    $produto->setModelo($dados['modelo']);
    $produto->setMarca($dados['marca']);
    $produto->setQuantidade($dados['quantidade']);
    $produto->setValorUnit($dados['valorunit']);
    $produto->setValorTotal($dados['valortotal']);
    $produto->setTamanho($dados['tamanho']);
    $produto->setTipo($dados['tipo']);

    if($produtodao->criar($produto)) {

        echo "<script>
            alert('tenis cadastrado');
            header('Location: views/cadastro_produto');
            </script>";
    }

}else if(isset($_POST['deletar'])) {
  
    $produto->setID($_POST['id_del']);

    if($produtodao->excluir($produto)) {

    echo "<script>
            alert('Prdouto excluído com Sucesso!!');
            location.href = '../views/listar_produto';
        </script>";
    }
}else if(isset($_POST['alterar'])) {

    $produto->setID($_POST['id_alter']);
    $produto->setModelo($_POST['modelo']);
    $produto->setMarca($_POST['marca']);
    $produto->setTamanho($_POST['tamanho']);
    $produto->setQuantidade($_POST['quantidade']);
    $produto->setTipo($_POST['tipo']);
    $produto->setValorUnit($_POST['valor_unitario']);
    $produto->setValorTotal($_POST['valor_total']);

    if($produtodao->alterar($produto)) {

        echo "<script>
                alert('Prdouto alterado com Sucesso!!');
                location.href = '../views/listar_produto';
            </script>";

    }

}

?>