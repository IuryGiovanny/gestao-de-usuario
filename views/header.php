<!-- views/header.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Usuários</title>

    <!-- Link para o CSS do Bootstrap (local) -->
    <link href="../assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Opcional: Link para o CSS de ícones (caso tenha baixado) -->
    <link href="../assets/bootstrap/dist/css/bootstrap-icons.css" rel="stylesheet">
    <link href="../public/css/style.css" rel="stylesheet">
</head>
<body>

     <!-- Navbar Responsiva -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- Logo ou nome do site -->
            <a class="navbar-brand" href="#">Gestão de Usuários</a>

            <!-- Botão que aparece em telas pequenas (Hamburger Menu) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu de Navegação -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Itens do Menu -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=lista">Lista de cadastro</a>
                    </li>
                    <?php if (isset($_SESSION['usuario_id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=cadastrar">Cadastrar</a>
                    </li>
                    <?php } if (!isset($_SESSION['usuario_id'])) { ?>
                    <!-- Botão de Login -->
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="index.php?action=login">Login</a>
                    </li>
                    <?php } else {?>
                         <!-- Botão de Login -->
                        <li class="nav-item">
                            <a class="btn btn-outline-light" href="index.php?action=logout">Logout</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
