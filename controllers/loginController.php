<?php 
// Criar Classe loginController com Métodos (funções) para validar usuário, senha e etc.

class loginController {

    public Function login () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario = $_POST['usuario'];
            $senha =$_POST['senha'];

            $user = UsuarioModel::buscarPorUsuario($usuario);
            
        } else {
            // Se não veio pelo Post, retorna login
            require 'views/loginView.php';
        }
    }
}
?>