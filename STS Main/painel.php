<?php
    include 'banco.php';


    //Se usuário clicou em "Apagar"
    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['apagar_id'])) {
        $idParaApagar = intval($_POST['apagar_id']);//proteção básica contra Injeção de SQL

    $sqlDelete = "DELETE FROM clientes WHERE id = $idParaApagar";

    mysqli_query($conexao, $sqlDelete);

    //Redirecionar de volta para lista principal
    header("Location: painel.php");
    exit;
    }

    // Lista de clientes vinda do banco
    $clientes = [];

    //Consulta no banco para Listar clients
    $sqlConsultaNome = "SELECT id, Nome FROM clientes";
    $resultado = mysqli_query($conexao, $sqlConsultaNome);

    if ($resultado) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            $clientes[$row['id']] = $row['Nome'];
        }
    }    //Percorre tabela e salva os valores em clientes


    // Cliente selecionado via GET
    $clienteSelecionado = $_GET['cliente_id'] ?? null;
    $detalhesCliente = null;

    //Consulta para pegar detalhes do cliente
    if ($clienteSelecionado) {
        $sqlDetalhes = "SELECT Nome, Número, Descrição FROM clientes WHERE id = $clienteSelecionado";
        $resultadoDetalhes = mysqli_query($conexao, $sqlDetalhes);

        if ($resultadoDetalhes && mysqli_num_rows($resultadoDetalhes) > 0) {
            $detalhesCliente = mysqli_fetch_assoc($resultadoDetalhes);
        }
    }

    mysqli_close($conexao);
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
        <p><strong> Nome:</strong> <?= htmlspecialchars($detalhesCliente['Nome']) ?></p>
        <p><strong> Número:</strong> <?= htmlspecialchars($detalhesCliente['Número']) ?></p>
        <p><strong> Descrição:</strong> <?= htmlspecialchars($detalhesCliente['Descrição']) ?></p>
    
    <!-- Formulário para apagar -->    
    <form method="POST" onsubmit="return confirm('Tem certeza que deseja apagar esse cliente?');">
        <input type="hidden" name="apagar_id" value="<?= $clienteSelecionado ?>">
        <button type="submit" style="background-color:red; color:white;">Apagar</button>

    </form>

    <?php else: ?>
        <p>Selecione um cliente para ver os detalhes.</p>
    <?php endif; ?>
</main>

</body>
</html>
