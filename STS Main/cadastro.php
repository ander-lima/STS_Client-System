<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <form method="POST" action="salvar_cliente.php">
        Nome: <input type="text" name="nome"><br>
        Número: <input type="text" name="numero">
        Valor Pago: <input type="text" name="valor_pago">
        Descrição: <input type="text" name="descricao">
        <button type="submit">Salvar</button>
    </form>
</body>
</html>