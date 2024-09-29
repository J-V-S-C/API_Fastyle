<?php


require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../model/cliente.php';


header('Content-Type: application/json');
$clienteModel = new Cliente($db);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        if ($_GET['action'] === 'login') {
            $dados = json_decode(file_get_contents('php://input'), true);
            $email = $dados['email'];
            $senha = $dados['senha'];

            $result = $clienteModel->buscarPorEmailSenha($email, $senha);
            if ($result->num_rows == 1) {
                session_start();
                $usuario = $result->fetch_assoc();
                $_SESSION['ID'] = $usuario['ID'];
                $_SESSION['email'] = $usuario['Email'];
                echo json_encode(['mensagem' => 'Login realizado com sucesso']);
            } else {
                http_response_code(401);
                echo json_encode(['erro' => 'Email ou senha incorretos']);
            }
        } elseif ($_GET['action'] === 'logout') {
            session_start();
            session_destroy();
            echo json_encode(['mensagem' => 'Logout realizado com sucesso']);
        }

        break;

    default:
        http_response_code(405);
        echo json_encode(['erro' => 'Método não permitido']);

        break;
}
