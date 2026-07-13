<?php

class Response
{
    public static function success($message, $data = null)
    {
        http_response_code(200);
        echo json_encode([
            "success" => true,
            "message" => $message,
            "data" => $data
        ]);
        exit;
    }

    public static function error($message)
    {
        http_response_code(200);
        echo json_encode([
            "success" => false,
            "message" => $message
        ]);

        exit;
    }
}