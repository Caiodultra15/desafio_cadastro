<?php

require_once __DIR__ . "/../config/session.php";
require_once __DIR__ . "/../controllers/AuthController.php";
require_once __DIR__ . "/../controllers/SolicitacaoController.php";
require_once __DIR__ . "/../helpers/Response.php";
header("Content-Type: application/json; charset=UTF-8");
function handleResponse(array $resultado): void
{
    if ($resultado["success"]) {
        Response::success(
            $resultado["message"],
            $resultado["data"] ?? null
        );
    }
    Response::error($resultado["message"]);
}

function requireMethod(string $method): void
{
    if ($_SERVER["REQUEST_METHOD"] !== strtoupper($method)) {
        Response::error(
            "Método não permitido.",
            405
        );
    }
}

$action = $_GET["action"] ?? "";

try {
    switch ($action) {
        case "login":
            requireMethod("POST");
            $controller = new AuthController();
            $resultado = $controller->login(
                $_POST["login"],
                $_POST["senha"]
            );
            handleResponse($resultado);
            break;
        case "cadastrar_usuario":
            requireMethod("POST");
            $controller = new AuthController();
            $resultado = $controller->cadastrar(
                $_POST["nome"],
                $_POST["cep"],
                $_POST["login"],
                $_POST["senha"]
            );
            handleResponse($resultado);
            break;
        case "cadastrar_solicitacao":
            requireMethod("POST");
            $controller = new SolicitacaoController();
            $resultado = $controller->cadastrar(
                $_SESSION["usuario"]["id"],
                $_POST["titulo"],
                $_POST["descricao"]
            );
            handleResponse($resultado);
            break;
         case "listar":
            requireMethod("GET");
            $controller = new SolicitacaoController();
            echo json_encode(
                $controller->listar(
                    $_SESSION["usuario"]["id"]
                )
            );
            break;
        case "concluir":
            requireMethod("POST");
            $controller = new SolicitacaoController();
            $resultado = $controller->concluir($_POST["id"]);
            handleResponse($resultado);
            break;
        case "excluir":
            requireMethod("POST");
            $controller = new SolicitacaoController();
            $resultado = $controller->excluir($_POST["id"]);
            handleResponse($resultado);
            break;
        default:
            Response::error(
                "Ação inválida.",
                404
            );
            break;
    }

}  catch (Throwable $e) {
    error_log($e->getMessage());
    Response::error(
        "Erro interno do servidor.",
        500
    );
}