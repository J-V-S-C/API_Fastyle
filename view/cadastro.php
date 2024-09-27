<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Cliente</title>
</head>

<body>

    <h1>Adicionar novo cliente</h1>
    <?php
    if (isset($_GET['cod'])) {
        $cod = $_GET['cod'];
        if ($cod == 401) {
            echo '<div style="background-color: red; color: white; padding: 5px;">ERRO DE LOGIN</div><br>';
        }
    }?>
    <form action="../controller/CadastroController.php" method="POST">
    <div>   
    <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" required><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" required><br>
        <input type="submit" value="Adicionar Cliente"></input>
        <?php

    require_once __DIR__ . '/../database.php';
    BuscarDB($db);
    ?>
    </div>
    </form>
</html>