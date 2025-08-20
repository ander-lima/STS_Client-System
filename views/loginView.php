<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso ao Sistema</title>
</head>
<body>

    <img src="../STS Main/imagens/sts_logo2.png" width="200" height="200" alt="STS-Logo">

    <form action="index.php?rota=login" method="post" autocomplete="off" > <!--Enviando para index.php com o valor de rota = login para informar que deve chamar o controller de login -->

        <label for="loginform-usuario">Usuário</label>
        <input type="text" name="usuario" id="loginform-usuario" placeholder="Usuário" required><br>

        <label for="loginform-senha">Senha</label>
        <input type="text" name="senha" id="loginform-senha" placeholder="Senha" required><br>

        <input type="submit" value="Fazer Login">
    </form>
</body>
</html>