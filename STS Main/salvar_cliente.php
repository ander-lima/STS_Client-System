<?php 
include 'banco.php';

$nome = $_POST['nome'];
$numero = $_POST['numero'];
$valor_pago = $_POST['valor_pago'];
$descricao = $_POST['descricao'];

$sql = "INSERT INTO clientes (Nome, Número, Valor Pago, Descrição) VALUES ('$nome', '$numero', '$valor_pago', '$descricao')";

if (mysqli_query($conexao, $sql)) {
    echo "Cliente salvo com sucesso";
} else {
    echo "Erro: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>