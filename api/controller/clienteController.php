<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../model/cliente.php';

header('Content-Type: application/json');
$clienteModel = new Cliente($db);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Verifica se a URL possui um ID como parte do caminho da URL
        if (preg_match('/^\\/api\\/cliente\\/(\\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
            $id = intval($matches[1]);
            $result = $clienteModel->buscarPorId($id);

            if ($result && $result->num_rows > 0) {
                $cliente = $result->fetch_assoc();
                echo json_encode($cliente);
            } else {
                http_response_code(404);
                echo json_encode(['erro' => 'Cliente não encontrado']);
            }
        }
        // Verifica se o ID foi passado como query string (?id=)
        elseif (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $result = $clienteModel->buscarPorId($id);

            if ($result && $result->num_rows > 0) {
                $cliente = $result->fetch_assoc();
                echo json_encode($cliente);
            } else {
                http_response_code(404);
                echo json_encode(['erro' => 'Cliente não encontrado']);
            }
        }
        // Caso nenhum ID seja fornecido, retorna todos os clientes
        else {
            $result = $clienteModel->buscarTodos();

            if ($result) {
                $clientes = [];
                while ($row = $result->fetch_assoc()) {
                    $clientes[] = $row;
                }
                echo json_encode($clientes);
            } else {
                http_response_code(500);
                echo json_encode(['erro' => 'Erro ao consultar o banco de dados']);
            }
        }

        break;

    case 'POST':
        $dados = json_decode(file_get_contents('php://input'), true);
        if ($clienteModel->inserir($dados)) {
            http_response_code(201);
            echo json_encode(['mensagem' => 'Cliente criado com sucesso']);
        } else {
            http_response_code(500);
            echo json_encode(['erro' => 'Erro ao criar cliente']);
        }

        break;

    case 'PUT':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $dados = json_decode(file_get_contents('php://input'), true);
            if ($clienteModel->atualizar($dados, $id)) {
                echo json_encode(['mensagem' => 'Cliente atualizado com sucesso']);
            } else {
                http_response_code(500);
                echo json_encode(['erro' => 'Erro ao atualizar cliente']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['erro' => 'ID do cliente não fornecido']);
        }

        break;

    case 'DELETE':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            if ($clienteModel->deletar($id)) {
                echo json_encode(['mensagem' => 'Cliente deletado com sucesso']);
            } else {
                http_response_code(500);
                echo json_encode(['erro' => 'Erro ao deletar cliente']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['erro' => 'ID do cliente não fornecido']);
        }

        break;

    default:
        http_response_code(405);
        echo json_encode(['erro' => 'Método não permitido']);

        break;
}
