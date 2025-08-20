<?php 
// index.php será o router. Ele receberá todas as requisições e decidirá qual controller chamar. 
// Vantagem: Organiza código; Deixa Url mais bonita (só aparece a rota chamada e não o nome do arquivo)

$rota = $_GET['rota'] ?? 'login'; // Define como variável rota por padrão o valor definido na URL. Ex: "index.php?rota=login" contém rota=login, mas também é definido por padrão se estiver vazio

switch($rota) { //Menu de decisões

    case 'login':

        require "controllers/loginController.php"; // Carrega o script de loginController para usar suas classes e métodos
        $controller = new LoginController(); // Cria uma instancia de classe (um objeto usando a classe LoginController) que poderá usar seus métodos 
        $controller->login(); // Faz o objeto usar o método da classe LoginController

        break;

    default:
        echo "Página não encontrada";

}

?>