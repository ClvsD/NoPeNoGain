<?php

require_once('../config/Conexao.php');
require_once('../dao/UsuarioDao.php');
require_once('../model/Usuario.php');

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
/* Usuario recebe os valores digitados na view e armazena dentro da variável $usuario*/

$usuario = new Usuario();
$usuariodao = new UsuarioDao();
$dados = filter_input_array(INPUT_POST);

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~



if(isset($_POST['cadastrar'])){
    $usuario->setNome($dados['nome_cad_usuario']);
    $usuario->setEmail($dados['email_cad_usuario']);
    //password_hash(                   , PASSWORD_DEFAULT)
    $usuario->setSenha(password_hash($dados['senha_cad_usuario'], PASSWORD_DEFAULT)); 
    
        if($usuariodao->criar($usuario)) {

            echo '<script>
                    alert("Cadastrado com sucesso")
                    location.href = "../";
                </script>';
            }


    

} else if(isset($_POST['login'])) {

	$usuario->setEmail(strip_tags($dados['email_login_usuario']));
	$usuario->setSenha(strip_tags($dados['senha_login_usuario'])); 

    $usuariodao->login($usuario);

	if($usuariodao->login($usuario)) {

        echo "<script>
                alert('Usuário logado com Sucesso!!');
                location.href = '../views/listar_produto';
            </script>";

	} else {
        
        echo "<script>
                alert('Acesso inválido! login ou senha incorretos!');
            </script>";
	}	

} else if(isset($_GET['logout'])) {

    $usuariodao->logout();
    header("Location: ../views/login");

} else {

    echo'<script> 
                alert("VISH");
            </script>';

}

?>