<?php

require_once __DIR__ . "/../models/Solicitacao.php";

class SolicitacaoController
{
    public function cadastrar($usuarioId, $titulo, $descricao) {
        if (empty($titulo) || empty($descricao)) {

            return [
                "success" => false,
                "message" => "Preencha todos os campos."
            ];

        }

        $solicitacao = new Solicitacao();

        $resultado = $solicitacao->cadastrar(
            $usuarioId,
            $titulo,
            $descricao
        );

        if ($resultado) {

           return [
                "success" => true,
                "message" => "Solicitação cadastrada.",
                "data" => null
            ];

        }

        return [
            "success" => false,
            "message" => "Erro ao cadastrar solicitação."
        ];
    }
    public function listar($usuario_id) {
            $solicitacao = new Solicitacao();
            return $solicitacao->listar($usuario_id);
    }
    public function concluir($id){
        $solicitacao = new Solicitacao();

        if ($solicitacao->concluir($id)) {

            return [
                "success" => true,
                "message" => "Solicitação concluída."
            ];

        }

        return [
            "success" => false,
            "message" => "Erro ao concluir solicitação."
        ];
    }
    public function excluir($id) {
        $solicitacao = new Solicitacao();

        if ($solicitacao->excluir($id)) {

            return [
                "success" => true,
                "message" => "Solicitação removida."
            ];

        }

        return [
            "success" => false,
            "message" => "Erro ao excluir."
        ];
    }

}