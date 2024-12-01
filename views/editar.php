<?php
    include_once '../views/header.php';
    require_once '../models/Usuario.php';
    require_once '../classes/Conexao.php';

    // Se o ID do usuário foi passado pela URL, buscamos os dados do usuário
    if (isset($_GET['id'])) {
        $usuarioId = $_GET['id'];
        // Chama a função para buscar o usuário
        $conexao = new Conexao();
        $usuarioObj = new Usuario($conexao->getConn());
        $usuario = $usuarioObj->buscarPorId($usuarioId); // Supondo que $usuarioObj seja o objeto de sua classe
    }
    if (isset($_SESSION['mensagem'])):
        $mensagem = $_SESSION['mensagem'];
        $tipo = $mensagem['tipo'];
        $texto = $mensagem['texto'];
        unset($_SESSION['mensagem']); // Remove a mensagem da sessão após exibição
?>
    <div class="alert alert-<?php echo $tipo; ?> mt-3" role="alert">
        <?php echo $texto; ?>
    </div>
<?php endif; ?>

<div class="container">
    <h1 class="mt-5">Editar Usuário</h1>
    
    <!-- Formulário de edição de usuário -->
    <form action="index.php?action=editar&id=<?php echo $usuario['id']; ?>" method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha">
            <small>Deixe em branco para não alterar a senha.</small>
        </div>

        <button type="submit" class="btn btn-primary">Salvar alterações</button>
    </form>
</div>

<?php
    include_once '../views/footer.php';
?>
