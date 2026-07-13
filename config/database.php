<?php

class Database
{
    private $host = "localhost";
    private $port = "5432";
    private $dbname = "controle_chamados";
    private $user = "postgres";
    private $password = "";

    public function connect()
    {
        try {

            $pdo = new PDO(
                "pgsql:host={$this->host};port={$this->port};dbname={$this->dbname}",
                $this->user,
                $this->password
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;

        } catch (PDOException $e) {

            die("Erro na conexão: " . $e->getMessage());

        }
    }
}