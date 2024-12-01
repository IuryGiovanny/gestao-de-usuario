<?php
class Conexao {
    private $host = DB_HOST;
    private $usuario = DB_USER;
    private $port = DB_PORT;
    private $senha = DB_PASS;
    private $banco = DB_NAME;
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->banco}", $this->usuario, $this->senha);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Erro na conexão: ' . $e->getMessage();
        }
        
    }

    public function getConn() {
        return $this->conn;
    }
}
?>
