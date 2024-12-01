<?php 
// logout.php
require_once 'controllers/LoginController.php';

$LoginController = new LoginController(null);  // Aqui, não precisamos do model

// Chama o método de logout
$LoginController->logout();
