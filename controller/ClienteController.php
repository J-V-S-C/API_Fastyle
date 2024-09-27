<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../database.php';



if ($_POST) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    if (isset($email) && isset($senha)) {
        $query = "SELECT * FROM Cliente WHERE Email = '$email' AND Senha = '$senha'";
    }
    $result = $db->query($query);
    if ($result->num_rows == 1) {
        session_start();
        $usuario = $result->fetch_assoc();
        $_SESSION['ID'] = $usuario['ID'];
        $_SESSION['email'] = $usuario['Email'];
        $_SESSION['nome'] = $usuario['Nome'];
        $_SESSION['telefone'] = $usuario['Telefone'];
        $_SESSION['cpf'] = $usuario['CPF'];
        $_SESSION['endereco'] = $usuario['Endereco'];
        header('location:../view/Paginas/Home.php');
    } else {
        header('location:../view/cadastro.php?cod=401');
    }
}
