<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_POST) {
    require_once __DIR__ . '/../database.php';
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $endereco = $_POST['endereco'];

    $query = "INSERT INTO Cliente (Nome, Telefone, CPF, Email, Senha, Endereco)
              VALUES ('$nome', '$telefone', '$cpf', '$email', '$senha', '$endereco')";

    // Executando a consulta
    if ($db->query($query)) {
        echo 'Dados inseridos com sucesso!';
        BuscarDB($db);
    } else {
        echo 'Erro ao inserir os dados: ' . $db->error;
    }
}
