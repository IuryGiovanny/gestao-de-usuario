<?php
// Incluindo as configurações e classes
require_once '../config/config.php';
require_once '../classes/Conexao.php';
require_once '../classes/Usuario.php';

// Criando a conexão com o banco
$conexao = new Conexao();
$conn = $conexao->getConn();

// Criando um objeto da classe Usuario
$usuario = new Usuario($conn);

// Exemplo de cadastramento de um usuário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($usuario->cadastrar($nome, $email, $senha)) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário!";
    }
}

?>