<?php // controllers/UsuarioController.php

require_once '../classes/Conexao.php';
require_once '../models/Usuario.php';

class LoginController {
    private $usuario;

    public function __construct() {
        $db = new Conexao();
        $this->usuario = new Usuario($db->getConn());
        if (session_status() == PHP_SESSION_NONE) {
            session_start();  // Inicia a sessão se não estiver ativa
        }
    }

    // Método de login
    public function login() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['email'];
            $senha = $_POST['senha'];

            // Verifica se o usuário existe e a senha está correta
            $usuario = $this->usuario->autenticar($email, $senha);

            if ($usuario) {
                // Inicia a sessão e armazena os dados do usuário
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                $_SESSION['usuario_email'] = $usuario['email'];

                // Redireciona para a página principal ou página segura
                header("Location: /index.php?action=lista");
                exit();
            } else {
                // Exibe mensagem de erro se as credenciais estiverem incorretas
                echo "E-mail ou senha inválidos!";
            }
        } else {
            require "../views/login.php";
            exit;
        }
    }

    // Método de logout
    public function logout() {
        session_destroy();
        header("Location: /index.php?action=login");
        exit();
    }
}

?>