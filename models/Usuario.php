<?php
require_once '../classes/Node.php';

class Usuario {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    // Método para autenticar o usuário
    public function autenticar($email, $senha) {
        $query = "SELECT id, nome, email, senha FROM usuario WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Verifica se o usuário foi encontrado
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Se o usuário for encontrado e a senha for válida
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario; // Retorna os dados do usuário
        }

        return false; // Senha incorreta ou usuário não encontrado
    }
    // Método para inserir um novo usuário no banco
    public function cadastrar($nome, $email, $senha) {
        try {
            $senha = password_hash($senha, PASSWORD_DEFAULT);
            $query = "INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();
            return true;
        } catch(\Exception $e) {
            return false;
        }

    }
    public function editarUsuario($id, $nome, $senha) {
        // Atualiza os dados do usuário no banco de dados
        $query = "UPDATE usuario SET nome = :nome, senha = :senha WHERE id = :id";
        
        // Prepara a consulta
        $stmt = $this->conn->prepare($query);
    
        // Faz o bind dos parâmetros
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':senha', password_hash($senha, PASSWORD_DEFAULT));  // Criptografa a senha
        $stmt->bindParam(':id', $id);
    
        // Executa a consulta
        if ($stmt->execute()) {
            return true; // Atualização bem-sucedida
        }
        
        return false; // Se falhar
    }
    // Método para inserir um novo usuário no banco
    public function excluir($id) {
        try {
            $query = "DELETE FROM usuario WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch(\Exception $e) {
            return false;
        }
    }
    // Método para buscar um usuário pelo email
    public function buscarPorId($id) {
        $query = "SELECT * FROM usuario WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
        // Método para buscar um usuário pelo email
    public function listarUsuarios() {

        $query = "SELECT * FROM usuario ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Se não houver usuários, retorna null (lista vazia)
        if (empty($usuarios)) {
            return null;
        }

        // Cabeça da lista encadeada
        $head = null;
        $current = null;

        // Criando a lista encadeada a partir dos usuários
        foreach ($usuarios as $usuario) {
            // Cria um novo nó para cada usuário
            $node = new Node($usuario);

            // Se a lista estiver vazia, o novo nó será a cabeça
            if ($head === null) {
                $head = $node;
                $current = $node;
            } else {
                // Caso contrário, adiciona o nó no final da lista
                $current->next = $node;
                $current = $node;
            }
        }

        // Retorna a cabeça da lista encadeada
        return $head;
    }
}
?>
