<?php 
session_start();
include 'banco.php';
// Códigos para CRUD de usuario

class UsuarioModel {

    public static function buscarPorUsuario($usuario) {

        $usuario = mysqli_real_escape_string($conexao, $usuario); // "Limpa" o valor de usuario para evitar SQL Injection

        $sqlBusca = "SELECT id, senha FROM usuarios WHERE usuario = '$usuario'"; // Código SQL da busca
        $retorno = mysqli_query($conexao, $sqlBusca);
        
        return mysqli_fetch_assoc($retorno);


    }
}

?>