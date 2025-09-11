<?php 
session_start();
include 'banco.php';
// Códigos para CRUD de usuario

class UsuarioModel {

    public static function buscarPorUsuario($usuario) {
        global $conexao; //Avisando PHP que função deve acessar variavel global determinada dentro de banco.php

        $usuario = mysqli_real_escape_string($conexao, $usuario); // "Limpa" o valor de usuario para evitar SQL Injection

        $sqlBusca = "SELECT id, senha FROM usuarios WHERE usuario = '$usuario'"; // Código SQL da busca
        $retorno = mysqli_query($conexao, $sqlBusca);
        
        return mysqli_fetch_assoc($retorno);


    }
}

$usuarioTeste = 'Admin';
$resultado = UsuarioModel::buscarPorUsuario ($usuarioTeste);
print_r($resultado);


?>