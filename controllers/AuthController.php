<?php

require_once __DIR__ . "/../config/session.php";
require_once __DIR__ . "/../models/Usuario.php";

class AuthController
{
    public function login($login, $senha)
    {
        $usuarioModel = new Usuario();

        $usuario = $usuarioModel->buscarPorLogin($login);

        if (!$usuario) {
            return [
                "success" => false,
                "message" => "Usuário não encontrado."
            ];
        }

        if (!password_verify($senha, $usuario["senha"])) {
            return [
                "success" => false,
                "message" => "Senha incorreta."
            ];
        }

        $_SESSION["usuario"] = [
            "id" => $usuario["id"],
            "nome" => $usuario["nome"],
            "login" => $usuario["login"]
        ];

        return [
            "success" => true,
            "message" => "Login realizado com sucesso.",
            "data" => $_SESSION["usuario"]
        ];
    }
    public function cadastrar($nome, $cep, $login, $senha)
    {
        $usuarioModel = new Usuario();

        $resultado = $usuarioModel->cadastrar(
            $nome,
            $cep,
            $login,
            $senha
        );

        if (!$resultado) {
            return [
                "success" => false,
                "message" => "Erro ao cadastrar usuário."
            ];
        }

        return [
            "success" => true,
            "message" => "Usuário cadastrado com sucesso.",
            "data" => null
        ];
    }
}