<?php
// Lista de Teste (Substituir por banco)
$clientes = [
    1 => 'Ana Silva',
    2 => 'Carlos Souza',
    3 => 'Ander Lima'
];

// Cliente selecionado via GET
$clienteSelecionado = $_GET['cliente_id'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <link rel="stylesheet" href="painelstyle.css">
</head>

<body>

<nav>
    <a class="btn-novo" href="cadastro.php">+</a>
    <ul>
        <?php foreach ($clientes as $id => $nome): ?>
            <li>
                <a href="?cliente_id=<?= $id ?>"><?= htmlspecialchars($nome) ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>

<main>
    <?php if ($clienteSelecionado && isset($clientes[$clienteSelecionado])): ?>
        <h2>Detalhes do cliente</h2>
        <p>Nome: <?= htmlspecialchars($clientes[$clienteSelecionado]) ?></p>
        
    <?php else: ?>
        <p>Selecione um cliente para ver os detalhes.</p>
    <?php endif; ?>
</main>

</body>
</html>
