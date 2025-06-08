<?php

//Login fixo
$usuario_correto = "AnneLima";
$senha_correta = "Anne123";

$erro = "";
$usuario_digitado = "";

//Se o form. foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario_digitado = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    //Validar senha
    if ($usuario_digitado === $usuario_correto && $senha === $senha_correta) {
        //login correto: Redireciona
        header("Location: ../STS Main/painel.php");
        exit;
    } else {
        $erro = "Usuário e/ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STS - Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <h1>Login do Sistema</h1>
        <form action="" method="POST">

            <label for="user">Usuário: </label>
            <input type="text" name="usuario" id="usuario" value="<?= htmlspecialchars($usuario_digitado) ?>" required>
            <label for="password">Senha: </label>
            <input type="password" name="senha" id="senha" required>

            <?php if (!empty($erro)): ?>
                <p class="erro"><?= $erro ?></p>
            <?php endif; ?>

            <input type="submit" value="Login">
        </form>
    </main>
</body>

</html>