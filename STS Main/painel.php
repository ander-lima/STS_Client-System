<?php
session_start();
include 'banco.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../STS Login/index.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

// === DELETAR CLIENTE ===
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['apagar_id'])) {
    $idParaApagar = intval($_POST['apagar_id']);
    mysqli_query($conexao, "DELETE FROM clientes WHERE id = $idParaApagar AND usuario_id = $usuario_id");
    header("Location: painel.php");
    exit;
}

// === EDITAR CLIENTE ===
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['editar_id'])) {
    $idParaEditar = intval($_POST['editar_id']);
    $novoNome = mysqli_real_escape_string($conexao, $_POST['novo_nome']);
    $novoNumero = mysqli_real_escape_string($conexao, $_POST['novo_numero']);
    $novaDescricao = mysqli_real_escape_string($conexao, $_POST['nova_descricao']);

    mysqli_query($conexao, "UPDATE clientes SET Nome = '$novoNome', Número = '$novoNumero', Descrição = '$novaDescricao' WHERE id = $idParaEditar AND usuario_id = $usuario_id");
    header("Location: painel.php?cliente_id=" . $idParaEditar);
    exit;
}

// === LISTAR CLIENTES DO USUÁRIO ===
$resultado = mysqli_query($conexao, "SELECT id, Nome FROM clientes WHERE usuario_id = $usuario_id");

$clientes = [];
while ($linha = mysqli_fetch_assoc($resultado)) {
    $clientes[$linha['id']] = $linha['Nome'];
}

// === DETALHES DO CLIENTE SELECIONADO ===
$clienteSelecionado = $_GET['cliente_id'] ?? null;
$detalhesCliente = null;

if ($clienteSelecionado) {
    $idSelecionado = intval($clienteSelecionado);
    $sqlDetalhes = "SELECT Nome, Número, Descrição FROM clientes WHERE id = $idSelecionado AND usuario_id = $usuario_id";
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
    <title>Painel de Clientes</title>
    <link rel="stylesheet" href="painelstyle.css">
    <style>
        #formulario-editar { display: none; }
    </style>
</head>
<body>

<nav>
    <a class="btn-novo" href="cadastro.php">+ Novo Cliente</a>
    <ul>
        <?php foreach ($clientes as $id => $nome): ?>
            <li>
                <a href="?cliente_id=<?= $id ?>"><?= htmlspecialchars($nome) ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>

<main>
     <!-- Formulário para apagar -->
        <form method="POST" onsubmit="return confirm('Tem certeza que deseja apagar esse cliente?');">
            <input type="hidden" name="apagar_id" value="<?= $clienteSelecionado ?>">
            <button type="submit" style="background-color:red; color:white;">Apagar</button>
        </form>

        <!-- Botão para abrir formulário de edição -->
        <button type="button" onclick="mostrarFormulario()">Editar Cliente</button>

        <!-- Formulário de edição -->
        <div id="formulario-editar">
            <h3>Editar Cliente</h3>
            <form method="POST">
                <input type="hidden" name="editar_id" value="<?= $clienteSelecionado ?>">

                Nome:<br>
                <input type="text" name="novo_nome" value="<?= htmlspecialchars($detalhesCliente['Nome']) ?>"><br>

                Número:<br>
                <input type="text" name="novo_numero" value="<?= htmlspecialchars($detalhesCliente['Número']) ?>"><br>

                Descrição:<br>
                <textarea name="nova_descricao" rows="30" style="width: 100%"> <?= htmlspecialchars($detalhesCliente['Descrição']) ?> </textarea>

                <button type="submit">Salvar Alterações</button>
            </form>
        </div>
        
    <?php if ($clienteSelecionado && isset($detalhesCliente)): ?>
        <h2>Detalhes do Cliente</h2>
        <p><strong>Nome:</strong> <?= htmlspecialchars($detalhesCliente['Nome']) ?></p>
        <p><strong>Número:</strong> <?= htmlspecialchars($detalhesCliente['Número']) ?></p>
        <p><strong>Descrição:</strong><br>
         <?= nl2br(htmlspecialchars($detalhesCliente['Descrição'])) ?></p>

       

        <script>
        function mostrarFormulario() {
            document.getElementById('formulario-editar').style.display = 'block';
        }
        </script>

    <?php else: ?>
        <p>Selecione um cliente para ver os detalhes.</p>
    <?php endif; ?>
</main>

</body>
</html>