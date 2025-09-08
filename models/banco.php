<?php 
//Detectar se está rodando local ou online para conseguir versionar sem riscos de segurança
if ($_SERVER['HTTP_HOST'] === 'localhost') {
    include 'config_local.php';
} else {
    include 'config_prod.php';
}


//Conexão com banco - Vai puxar o especifico do ambiente
$conexao = mysqli_connect($host, $usuario, $senha, $banco);

//Teste de Conexão
if (!$conexao) {
    die ("Falha na conexão:" . mysqli_connect_error());
}

mysqli_set_charset($conexao, 'utf8mb4');
?>