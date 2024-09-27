<?php

// Habilita a exibição de erros detalhados
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once './view/login.php';

/*
// Instancia o controller de chama o método para listar os clientes
$controller = new ClienteController($db);
$controller->listarClientes();

$nome = 'Arthur Caldeira';
$telefone = '333333333333333';
$cpf = '33.747.432-10';
$login = 'ArthurC';
$senha = password_hash('minhasenha', PASSWORD_BCRYPT);
$endereco = 'Rua Exemplo, 123';

// Consulta SQL para inserir um novo cliente
$query = "INSERT INTO Cliente (Nome, Telefone, CPF, Login, Senha, Endereco)
          VALUES ('$nome', '$telefone', '$cpf', '$login', '$senha', '$endereco')";

if ($db->query($query) === true) {
    echo 'Cliente cadastrado com sucesso!';
} else {
    echo 'Erro ao cadastrar cliente: ' . $db->error;
}
*/
