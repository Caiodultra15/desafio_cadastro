<?php

require_once __DIR__ . "/../config/database.php";

class Usuario
{
    private PDO $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

   public function cadastrar($nome, $cep, $login, $senha) {
        try {

            $sql = "
                INSERT INTO usuarios
                (
                    nome,
                    cep,
                    login,
                    senha
                )
                VALUES
                (
                    :nome,
                    :cep,
                    :login,
                    :senha
                )
            ";

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ":nome" => $nome,
                ":cep" => $cep,
                ":login" => $login,
                ":senha" => password_hash($senha, PASSWORD_DEFAULT)
            ]);

            return true;

        } catch (PDOException $e) {

            return false;

        }
    }

    public function buscarPorLogin($login) {
        $sql = "
            SELECT *
            FROM usuarios
            WHERE login = :login
            LIMIT 1
        ";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ":login" => $login
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}