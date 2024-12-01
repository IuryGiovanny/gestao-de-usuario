<?php
// Definindo a classe Node para a lista encadeada
class Node {
    public $usuario;
    public $next;

    // Construtor do nó, recebe um usuário e o próximo nó (inicialmente nulo)
    public function __construct($usuario) {
        $this->usuario = $usuario;
        $this->next = null;
    }
}