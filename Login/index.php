<?php

session_start();
include '../STS Main/banco.php';

$erro = "";
$usuario_digitado = "";

//Se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario_digitado = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $senha_digitada = $_POST['senha'];

    // Consulta SQL (modo simples)
    $sql = "SELECT id, senha FROM usuarios WHERE usuario = '$usuario_digitado'";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $user = mysqli_fetch_assoc($resultado);

        // (Depois: Trocar para password_verify se for usar senha criptografada)
        if ($senha_digitada === $user['senha']) {
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_nome'] = $usuario_digitado;

            header("Location: ../STS Main/painel.php");
            exit;
        } else {
            $erro = "Usuário e/ou senha incorretos.";
        }
    } else {
        $erro = "Usuário e/ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>STS - Login</title>
    <link rel="stylesheet" href="style_login.css">
</head>
<body>
    <main class ="login-container">
        <h1>login</h1>
        <?php if ($erro): ?>
            <p style="color:red;"><?= $erro ?></p>
        <?php endif; ?>

        <form action="" method="POST">
            <label for="usuario">Usuário: </label>
            <input type="text" name="usuario" id="usuario" value="<?= htmlspecialchars($usuario_digitado) ?>" required>

            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha" required>

            <input type="submit" value="Login">
        </form>
    </main>
</body>
</html>
