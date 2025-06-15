<?php 

session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../STS Login/index.php");
    exit;
}
include 'banco.php';

$mensagem = "";

//Verifica se foi enviado
if ($_SERVER ["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $numero = $_POST['numero'];
    $descricao = $_POST['descricao'];

    //cria sql para inserir no banco
    $sql = "INSERT INTO clientes (Nome, Número, Descrição) VALUES ('$nome', '$numero', '$descricao')";

    if (mysqli_query($conexao, $sql)) {
        $mensagem = "Cliente salvo com sucesso";
    } else {
        $mensagem = "Erro: " . mysqli_error($conexao);
    }
    mysqli_close($conexao);
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php if ($mensagem): ?>
        <p><?php echo $mensagem; ?></p>
    <?php endif; ?>    

    <form method="POST" action="">
        Nome: <input type="text" name="nome"><br>
        Número: <input type="text" name="numero">
        Descrição: <input type="text" name="descricao">
        <button type="submit">Salvar</button>
        <a href="painel.php">Voltar</a>
    </form>
</body>
</html>