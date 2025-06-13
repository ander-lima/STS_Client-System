<?php 
// Variaveis 
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "clientes";

//Conexão com banco
$conexao = mysqli_connect($host, $usuario, $senha, $banco);

//Teste de Conexão
if (!$conexao) {
    die ("Falha na conexão:" . mysqli_connect_error());
}

?>