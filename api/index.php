<?php

//pega a url, com os parâmetros $_SERVER['REQUEST_URI'] indicando a url completa após o domínio e PHP_URL_PATH é uma constante q só me retorna o caminho, tirando query strings e outras coisas
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//a função vai retornar só o que foi específicado em php_url_path, essa viadice é para determinar qual foi o pedido do cliente para após isso rotear ele

if (preg_match('/^\\/api\\/cliente(\\/\\d+)?$/', $uri, $matches)) {
    //essa preg_match vai comparar o caminho com a $uri que pegamos antes, esse $matches é opcional, ele vai guardar o caminho feio
    require_once __DIR__ . '/controller/clienteController.php';
} elseif (preg_match('/^\\/api\\/auth$/', $uri)) {
    require_once __DIR__ . '/controller/authController.php';
} else {
    http_response_code(404);
    echo json_encode(['erro' => 'Recurso não encontrado']);
    //isso vai infromar erro, esse json_encode vai converter o array associativo numa string json
}
