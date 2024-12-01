<?php
    include_once 'header.php';
?>
<div class="container">
    <h2>Login</h2>
    <form action="index.php?action=login" method="POST">
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>


<?php
    include_once 'footer.php';
?>
