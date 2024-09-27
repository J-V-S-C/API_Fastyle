<?php

require_once __DIR__ . '/../database.php';
session_start();
$Newnome = $_POST['nome'];
$Newtelefone = $_POST['telefone'];
$Newcpf = $_POST['cpf'];
$Newemail = $_POST['email'];
$Newsenha = $_POST['senha'];
$Newendereco = $_POST['endereco'];



$id = $_SESSION['ID'];

$Newquery = "UPDATE Cliente
    SET Nome = '$Newnome', Email = '$Newemail', CPF = '$Newcpf', Email = '$Newemail', Senha = '$Newsenha', Endereco = '$Newendereco' 
    WHERE ID = $id;";
$db->query($Newquery);
header('location:../view/Paginas/Home.php');
