<?php
require_once '../config/config.php';
require_once '../controllers/UsuarioController.php';
require_once '../controllers/LoginController.php';

// Inicializando os controladores
$usuarioController = new UsuarioController();
$loginController = new LoginController();

// Obtendo a ação da URL (pode ser via GET, POST ou via query string)
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Definindo as rotas
switch ($action) {
    case 'cadastro':
        // Exibe o formulário de cadastro
        $usuarioController->cadastro();
        break;
    case 'cadastrar':
        // Processa o cadastro
        $usuarioController->cadastrar();
        break;
    case 'login':
        // Exibe o formulário de login
        $loginController->login();
        break;
    case 'logout':
        // Faz o logout e redireciona para a página de login
        $loginController->logout();
        break;
    case 'lista':
        // Faz o logout e redireciona para a página de login
        $usuarioController->listar();
        break;
    case 'excluir':
        // Faz o logout e redireciona para a página de login
        $usuarioController->excluir();
        break;
    case 'editar':
        // Faz o logout e redireciona para a página de login
        $usuarioController->editar();
        break;
    default:
        // Se não for nenhuma das ações definidas, redireciona para o login
        $loginController->login();
}

?>
