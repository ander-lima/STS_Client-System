<?php
session_start();
include 'banco.php';

//Verificação de permissão de usuário básica
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $numero = mysqli_real_escape_string($conexao, $_POST['numero']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
    $usuario_id = $_SESSION['usuario_id'];

    mysqli_query($conexao, "INSERT INTO clientes (Nome, Número, Descrição, usuario_id) VALUES ('$nome', '$numero', '$descricao', $usuario_id)");
    header("Location: painel.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="style_painel.css">

</head>
<body>
    <h1>Cadastrar Cliente</h1>
    <form method="POST">
        Nome: <input type="text" name="nome"><br>
        Número: <input type="text" name="numero"><br>
        <!-- Descrição: <input type="text" name="descricao"><br>-->
         Descrição: <textarea name="descricao" rows="10" style="width: 100%"></textarea>
        <button type="submit">Salvar</button>
    </form>
    <a href="painel.php">Voltar ao Painel</a>
</body>
</html>
