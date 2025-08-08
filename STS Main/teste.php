<?php 
include 'imagens/imagens.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/fear.ico" type="image/x-icon">
    <title>Ordem Paranormal</title>
</head>
<body>
    <main>
        <h1>Imagem</h1>
        <h2>Esse texto é h2</h2>
        <h3>Esse texxto é h3</h3>
        <h2>Esse texto é outro h2</h2>
        <h5>Esse texto é h5</h5>
        <h6>Esse texto é h6</h6>


        <p>Abaixo você verá uma imagem</p>
        <img src="imagens/ordem_600.webp" alt="Imagem da Ordem">
        <img src="imagens/paranormal.png" alt="Imagem Paranormal">
        <img src="<?= $imagem ?>" alt="Mais uma imagem">
    </main>
</body>
</html>
