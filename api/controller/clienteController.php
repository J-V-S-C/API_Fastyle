<?php




require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../model/cliente.php';


header('Content-Type: application/json');
$clienteModel = new Cliente($db);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $result = $clienteModel->buscarPorId($id);
            $cliente = $result->fetch_assoc();
            echo json_encode($cliente);
        } else {
            $result = $clienteModel->buscarTodos();
            $clientes = [];
            while ($row = $result->fetch_assoc()) {
                $clientes[] = $row;
            }
            echo json_encode($clientes);
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
            if ($clienteModel->atualizar($id, $dados)) {
                echo json_encode(['mensagem' => 'Cliente atualizado com sucesso']);
            } else {
                http_response_code(500);
                echo json_encode(['erro' => 'Erro ao atualizar cliente']);
            }
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
        }

        break;

    default:
        http_response_code(405);
        echo json_encode(['erro' => 'Método não permitido']);

        break;
}
