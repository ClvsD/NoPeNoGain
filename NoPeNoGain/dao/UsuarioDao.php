<?php

class UsuarioDao {

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        // Solicita um comando sql de inserção.
        // Após receber os dados que vieram do controller, executa o comando para inserir.
    function criar(Usuario $usuario) {
        try {
            $sql = "INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario, token_usuario) VALUES (:nome, :email, :senha, :token)";
            $stmt = Conexao::getConexao()->prepare($sql);
            $stmt->bindValue(":nome", $usuario->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(":senha", $usuario->getSenha(), PDO::PARAM_STR);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao tentar cadastrar usuario" . $e->getMessage();
        }
    }
    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */


    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        // puxa tudo que foi salvo em $linha
        private function listaUsuarios($linha) {
            $usuario = new Usuario();
            $usuario->setID($linha['id_usuario']);
            $usuario->setNome($linha['nome']);
            $usuario->setEmail($linha['email']);
            
            return $usuario;
        }
    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */


    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
        // sistema solicita um comando mysql de seleção e armazena os dados na variavel $linha
        function listar() {
            try {
                $sql = "SELECT * FROM usuario order by nome_usuario asc";
                $stmt = Conexao::getConexao()->query($sql);
                $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $list = array();
                foreach ($lista as $linha) {
                    $list[] = $this->listaUsuarios($linha);
                }
                return $list;
            } catch (PDOException $e) {
                echo "Ocorreu um erro ao tentar Buscar Todos." . $e->getMessage();
            }
        }

        function alterar(Usuario $usuario) {
            try {
                $sql = "UPDATE usuario SET nome_usuario = :nome, email_usuario = :email, senha_usuario = :senha WHERE id_usuario = :id";
    
                $stmt = Conexao::getConexao()->prepare($sql);
                $stmt->bindValue(":id", $usuario->getID(), PDO::PARAM_INT);
                $stmt->bindValue(":nome", $usuario->getNome(), PDO::PARAM_STR);
                $stmt->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR);
                $stmt->bindValue(":senha", $usuario->getSenha(), PDO::PARAM_STR);
                
                return $stmt->execute();
    
            } catch (PDOException $e) {
                echo "Ocorreu um erro ao tentar atualizar Usuário." . $e->getMessage();
            }
        }



    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

        public function login(Usuario $usuario) {
            try {
                $sql = "SELECT * FROM usuario WHERE email = :email";
                $stmt = Conexao::getConexao()->prepare($sql);
                $stmt->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR);
                $stmt->execute();
                $user_linha = $stmt->fetch(PDO::FETCH_ASSOC);
                        
                if($stmt->rowCount() == 1) {
    
                    if($usuario->getSenha() == $user_linha['senha']) {
    
                        $_SESSION['user_session'] = $user_linha['id_usuario'];
                        session_start();
                        return true;
                        
                    } else {
                        return false;
                    }
                }
            }
            catch(PDOException $e) {
    
                echo "Erro ao tentar realizar o login do usuario" . $e->getMessage();
            }
        }
    
        public function checkLogin() {
            if(isset($_SESSION['user_session'])) {
                return true;
            }else {
                return false;
            }
        }
    
        public function logout() {
            session_start();
            session_destroy();
            unset($_SESSION['user_session']);
            return true;
        }

        public function user() {
            try {
                $sql = "SELECT * FROM usuario WHERE id_usuario = :id";
                $stmt = Conexao::getConexao()->prepare($sql);
                $stmt->bindValue(":id", $_SESSION['user_session'] , PDO::PARAM_INT);
                $stmt->execute();
                $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $list = array();
    
                foreach ($lista as $linha) {
                    $list[] = $this->listaUsuarios($linha);
                }
    
                return $list;
    
            } catch (PDOException $e) {
                echo "Ocorreu um erro ao tentar buscar Usuário." . $e->getMessage();
            }
    
        }





}

?>