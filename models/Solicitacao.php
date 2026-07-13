<?php

require_once __DIR__ . "/../config/database.php";

class Solicitacao
{
    private PDO $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }
    public function cadastrar($usuarioId, $titulo, $descricao) {
        $sql = "
            INSERT INTO solicitacoes
            (
                usuario_id,
                titulo,
                descricao
            )
            VALUES
            (
                :usuario_id,
                :titulo,
                :descricao
            )
        ";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ":usuario_id" => $usuarioId,
            ":titulo" => $titulo,
            ":descricao" => $descricao
        ]);
    }
    public function listar($usuarioId)
    {
        $sql = "
            SELECT
                s.id,
                s.titulo,
                s.descricao,
                s.status,
                s.created_at,
                u.nome AS usuario
            FROM solicitacoes s
            INNER JOIN usuarios u
                ON u.id = s.usuario_id
            WHERE s.usuario_id = :usuario_id
            ORDER BY s.created_at DESC
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":usuario_id", $usuarioId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function concluir($id) {
        $sql = "
            UPDATE solicitacoes
            SET status = 'Concluido'
            WHERE id = :id
            AND status = 'Pendente'
        ";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ":id" => $id
        ]);
    }
    public function excluir($id){
        $sql = "
            DELETE FROM solicitacoes
            WHERE id = :id
        ";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ":id" => $id
        ]);
    }

}