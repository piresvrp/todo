<?php

class Conexao {
    private static $instancia = null;
    private $pdo;

    private function __construct() {
        $host = "localhost";
        $dbname = "todo";
        $usuario = "root";
        $senha = "ongsys";

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }

    // Singleton: garante uma única conexão
    public static function getInstance() {
        if (self::$instancia === null) {
            self::$instancia = new Conexao();
        }
        return self::$instancia;
    }

    // Retorna o objeto PDO para consultas
    public function getConnection() {
        return $this->pdo;
    }
}
