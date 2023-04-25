<?php

class ProdutoDao{

    public function criar(Produto $produto) {
        try {
            
            $sql = "INSERT INTO tenis (modelo, marca, quantidade, valor_unitario, valor_total, tamanho, tipo) VALUES (:modelo, :marca, :quantidade, :valorunit, :valortotal, :tamanho, :tipo)";
    
            $stmt = Conexao::getConexao()->prepare($sql);

            /* Operação de Valor total */
            $quantidade = $produto->getQuantidade();
            $valorunitario = $produto->getValorUnit();
            $valortotal = ($valorunitario * $quantidade);
            /* Operação de Valor total */
            
            
            $stmt->bindValue(":modelo", $produto->getModelo(), PDO::PARAM_STR);
            $stmt->bindValue(":marca", $produto->getMarca(), PDO::PARAM_STR);
            $stmt->bindValue(":quantidade", $produto->getQuantidade(), PDO::PARAM_INT);
            $stmt->bindValue(":valorunit", $produto->getValorUnit(), PDO::PARAM_STR);
            $stmt->bindValue(":valortotal", $valortotal, PDO::PARAM_STR);
            $stmt->bindValue(":tamanho", $produto->getTamanho(), PDO::PARAM_INT);
            $stmt->bindValue(":tipo", $produto->getTipo(), PDO::PARAM_STR);
            
            return $stmt->execute();

            
            echo "o valor total foi: " . $valortotal . "<br>"; 
            
    
        } catch (PDOException $e) {
            echo "Erro ao Inserir Produto <br>" . $e->getMessage();
        }
    }

    public function Listagem(){


        try {  
                
                $sql = "SELECT * FROM tenis WHERE id_tenis = :id";
                $stmt = Conexao::getConexao()->prepare($sql);
                $stmt->bindValue(":id", $_POST['excluir'], PDO::PARAM_INT);
                $stmt->execute();

                $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $list = array();
        
                foreach ($lista as $linha) {
                    $list[] = $this->listaProdutos($linha);
                }
        
                return $list; 
            
        } catch (PDOException $e) {
            //echo "Erro ao carregar produtos." . $e->getMessage();
        }
        
    }

    public function ListagemModelo(){


        try {  

                $sql = "CALL busca_modelos(:modelo)";
                $stmt = Conexao::getConexao()->prepare($sql);
                $stmt->bindValue(":modelo", $_POST['busca_modelo'], PDO::PARAM_STR);
                $stmt->execute();

                $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $list = array();
        
                foreach ($lista as $linha) {
                    $list[] = $this->listaProdutos($linha);
                }
        
                return $list; 
            
        } catch (PDOException $e) {
            //echo "Erro ao carregar produtos." . $e->getMessage();
        }
        
    }

    public function ListagemMarca(){

        try {  
                
                $sql = "SELECT * FROM tenis WHERE marca LIKE :marca";
                $stmt = Conexao::getConexao()->prepare($sql);
                $stmt->bindValue(":marca", $_POST['busca_marca'], PDO::PARAM_STR);
                $stmt->execute();

                $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $list = array();
        
                foreach ($lista as $linha) {
                    $list[] = $this->listaProdutos($linha);
                }
        
                return $list; 
            
        } catch (PDOException $e) {
            //echo "Erro ao carregar produtos." . $e->getMessage();
        }
        
    }

    

    public function ListagemValorUnitario(){


        try {

            $sql = "SELECT * FROM tenis where valor_unitario > :valor order by valor_unitario asc";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":valor", $_POST['busca_valor'], PDO::PARAM_STR);
            $stmt->execute();

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();
        
            foreach ($lista as $linha) {
                $list[] = $this->listaProdutos($linha);
            }
        
                return $list; 
            
        } catch (PDOException $e) {
            //echo "Erro ao carregar produtos." . $e->getMessage();
        }
        
    }

    public function ListagemQuantidade(){

        try{
            $order = $_POST['busca_quantidade'];

            if($order == 'cresc'){
                $sql = "SELECT * FROM tenis order by quantidade asc";
            }else if($order == 'decresc'){
                $sql = "SELECT * FROM tenis order by quantidade desc";
            }

            
            $stmt = Conexao::getConexao()->query($sql);
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $list = array();

            foreach ($lista as $linha) {
                $list[] = $this->listaProdutos($linha);
            }

            return $list; 
            
        } catch (PDOException $e) {
            //echo "Erro ao carregar produtos." . $e->getMessage();
        }
        
    }

    public function ListagemTamanho(){


        try {  

                $sql = "SELECT * FROM tenis where tamanho like :tamanho";
                $stmt = Conexao::getConexao()->prepare($sql);
                $stmt->bindValue(":tamanho", $_POST['busca_tamanho'], PDO::PARAM_STR);
                $stmt->execute();

                $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $list = array();
        
                foreach ($lista as $linha) {
                    $list[] = $this->listaProdutos($linha);
                }
        
                return $list;
            
        } catch (PDOException $e) {
            //echo "Erro ao carregar produtos." . $e->getMessage();
        }
        
    }

    public function ListagemTipo(){


        try {  

                $sql = "SELECT * FROM tenis WHERE tipo LIKE :tipo";
                $stmt = Conexao::getConexao()->prepare($sql);
                $stmt->bindValue(":tipo", $_POST['busca_tipo'], PDO::PARAM_STR);
                $stmt->execute();

                $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $list = array();
        
                foreach ($lista as $linha) {
                    $list[] = $this->listaProdutos($linha);
                }
        
                return $list; 
            
        } catch (PDOException $e) {
            //echo "Erro ao carregar produtos." . $e->getMessage();
        }
        
    }

    private function listaProdutos($linhas) {

        $veiculo = new Produto();
        $veiculo->setID($linhas['id_tenis']);
        $veiculo->setModelo($linhas['modelo']);
        $veiculo->setMarca($linhas['marca']);
        $veiculo->setQuantidade($linhas['quantidade']);
        $veiculo->setValorUnit($linhas['valor_unitario']);
        $veiculo->setValorTotal($linhas['valor_total']);
        $veiculo->setTamanho($linhas['tamanho']);
        $veiculo->setTipo($linhas['tipo']);
        
        return $veiculo;

}

public function listar() {
    try{
        $sql = "SELECT * FROM tenis order by id_tenis desc";

        $stmt = Conexao::getConexao()->query($sql);
        $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $list = array();

        foreach ($lista as $linha) {
            $list[] = $this->listaProdutos($linha);
        }

        return $list;

} catch (PDOException $e) {
    //echo "Ocorreu um erro ao tentar Buscar Todos." . $e->getMessage();
}
}

public function excluir(Produto $produto) {
    try {

        $sql = "DELETE FROM tenis WHERE id_tenis = :id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(":id", $produto->getID(), PDO::PARAM_INT);
        return $stmt->execute();

    } catch (PDOException $e) {
        echo "Erro ao Excluir produto" . $e->getMessage();
    }
}

public function alterar(Produto $produto) {

        try {
            $sql = "UPDATE tenis SET modelo = :modelo, marca = :marca, tamanho = :tamanho, quantidade = :quantidade, tipo = :tipo, valor_unitario = :valor_unitario, valor_total = :valor_total WHERE id_tenis = :id";
    
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":id", $produto->getID(), PDO::PARAM_INT);
            $stmt->bindValue(":modelo", $produto->getModelo(), PDO::PARAM_STR);
            $stmt->bindValue(":marca", $produto->getMarca(), PDO::PARAM_STR);
            $stmt->bindValue(":tamanho", $produto->getTamanho(), PDO::PARAM_STR);
            $stmt->bindValue(":quantidade", $produto->getQuantidade(), PDO::PARAM_STR);
            $stmt->bindValue(":tipo", $produto->getTipo(), PDO::PARAM_STR);
            $stmt->bindValue(":valor_unitario", $produto->getValorUnit(), PDO::PARAM_STR);
            $stmt->bindValue(":valor_total", $produto->getValorTotal(), PDO::PARAM_STR);
    
            return $stmt->execute();
    
        } catch (PDOException $e) {
            //echo "Ocorreu um erro ao tentar atualizar Produto." . $e->getMessage();
        }
}

}

?>