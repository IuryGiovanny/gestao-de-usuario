<!-- public/cadastro.php -->
<?php
    include_once '../views/header.php';
   
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
<div class="container mt-5">
    <h2 class="text-center mb-4">Cadastro de Usuário</h2>
    <form method="POST" action="?action=cadastrar">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" class="form-control" name="senha" id="senha" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

<?php
    include_once '../views/footer.php';
?>
