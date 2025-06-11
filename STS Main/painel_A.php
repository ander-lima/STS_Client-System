<?php
//Simulando um banco de dados
$clientes = [
    'Ander Lima', 'Gabryel Lima', 'Anne Lima'
];

//Escolha de Clientes
$clienteescolhido = $_GET ['cliente_id'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STS - System to Sister</title>
    <link rel='stylesheet' href='painelstyle_A.css'>
</head>

<body>
    <nav>
        <a class = "botao_novo" href="cadastro.php">+</a> <!-- Cria simbolo de "+" que linka para tela de cadastro -->
        <ul>
            <?php foreach ($clientes as $id => $nome): ?> <!-- Define o inicio do looping para percorrer a lista de clientes, futuramente do Banco de Dados -->
                <li>
                    <a href="?client_id=<?= $id ?>"><?php echo htmlspecialchars($nome) ?> </a> <!-- Cria a lista de clientes e seus links para páginas contendo eles mesmos -->
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</body>
</html>
