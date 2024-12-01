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
<div class="container">
    <?php if( isset($_SESSION['usuario_nome']) ) { ?>
            <!-- Botão para adicionar um novo usuário -->
        <a href="index.php?action=cadastrar" class="btn btn-primary mt-3">Cadastrar Novo Usuário</a>
    <?php } ?>


    <h1 class="mt-5">Lista de Usuários</h1>
    
    <!-- Tabela para exibir os usuários -->
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <?php if( isset($_SESSION['usuario_nome']) ) { ?>
                    <th>Ações</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
        <?php
            // Percorre a lista encadeada e exibe os dados dos usuários
            $current = $usuarios; // A variável $usuarios agora é a cabeça da lista encadeada
            while ($current !== null) {
                // Acessa os dados do usuário do nó atual
                $usuario = $current->usuario; // $current->usuario contém os dados do usuário
        ?>
            <tr>
                <td><?php echo htmlspecialchars($usuario['id']); ?></td>
                <td><?php echo htmlspecialchars($usuario['nome']); ?></td>
                <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                <?php if( isset($_SESSION['usuario_nome']) ) { ?>
                    <td>
                        <!-- Aqui você pode adicionar links para editar ou excluir o usuário -->
                        <a href="index.php?action=editar&id=<?php echo $usuario['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="index.php?action=excluir&id=<?php echo $usuario['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                <?php } ?>
            </tr>
        <?php
                // Avança para o próximo nó na lista
                $current = $current->next;
            }
        ?>
        </tbody>
    </table>
</div>

<?php
    include_once '../views/footer.php';
?>
