<?php
require_once '../models/Usuario.php';
require_once '../classes/Conexao.php';

class UsuarioController {
    private $usuario;

    public function __construct() {
        // Criando a conexão com o banco de dados
        $conexao = new Conexao();
        $this->usuario = new Usuario($conexao->getConn());
        if (session_status() == PHP_SESSION_NONE) {
            session_start();  // Inicia a sessão se não estiver ativa
        }
    }

    // Método para exibir a página de cadastro
    public function cadastro() {
        require_once '../views/cadastro.php';
    }

    // Método para cadastrar um usuário
    public function cadastrar() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if ($this->usuario->cadastrar($nome, $email, $senha)) {
                if ( isset($_SESSION['usuario_id'])) {
                    $_SESSION['mensagem'] = ['tipo' => 'success', 'texto' => 'Usuário cadastrado com sucesso!'];
    
                    header("Location: index.php?action=lista");
                }else {
                    setcookie("usuario_cadastrado", "true", time() + 3600, "/");  // Define o cookie
                    $_SESSION['mensagem'] = ['tipo' => 'success', 'texto' => 'Usuário cadastrado com sucesso!'];
                    header("Location: index.php?action=login");
                }
                exit();
            } else {
                $_SESSION['mensagem'] = ['tipo' => 'danger', 'texto' => 'Erro ao cadastrar o usuário!'];
                header("Location: index.php?action=cadastrar");
                exit();
            }
        } else {
            include '../views/cadastro.php';
        }
    }
        // Método para cadastrar um usuário
        public function editar() {

            $usuarioId = isset($_GET['id']) ? $_GET['id'] : null;

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
                // Obtém os dados do formulário
                $usuarioId = $_GET['id'];
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
            
                // Se a senha não foi preenchida, não altera a senha
                if (empty($senha)) {
                    // Pega os dados atuais (sem modificar a senha)
                    $usuario = $this->usuario->buscarPorId($usuarioId);
                    $senha = $usuario['senha']; // Mantém a senha atual
                }
            
                // Chama a função para editar o usuário
                $resultado = $this->usuario->editarUsuario($usuarioId, $nome, $email, $senha);
            
                if ($resultado) {
                    // Redireciona ou exibe mensagem de sucesso
                    $_SESSION['mensagem'] = ['tipo' => 'success', 'texto' => 'Usuário atualizado com sucesso!'];
       
                    header("Location: index.php?action=lista"); // Exemplo de redirecionamento
                    exit;
                } else {
                    $_SESSION['mensagem'] = ['tipo' => 'danger', 'texto' => 'Erro ao atualizar o usuário.'];
                    header('Location: index.php?action=editar&id=' . $usuarioId);
                    exit;

                }
            } else {

                if($usuarioId != null) {
                    include '../views/editar.php';
                } else {
                    $_SESSION['mensagem'] = ['tipo' => 'danger', 'texto' => 'Usuário não foi informado.'];
       
                    header("Location: index.php?action=lista"); // Exemplo de redirecionamento
                }

            }
            
        }

    // Método para cadastrar um usuário
    public function excluir() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];

            if ($this->usuario->excluir($id)) {
                $_SESSION['mensagem'] = ['tipo' => 'success', 'texto' => 'Usuário deletado com sucesso!'];
       
                header("Location: index.php?action=lista");
            } else {
                $_SESSION['mensagem'] = ['tipo' => 'danger', 'texto' => 'Erro ao deletar o usuário.'];
        
                header("Location: index.php?action=lista");
            }
        } else {
            include '../views/cadastro.php';
        }
    }
    // Método para listar todos os usuários
    public function listar() {
        // Recupera todos os usuários do banco de dados
        $usuarios = $this->usuario->listarUsuarios();

        // Inclui a view que será responsável pela exibição
        include '../views/lista.php';
    }

}
?>
