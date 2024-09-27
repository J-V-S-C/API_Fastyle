<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Cliente</title>
</head>
<body>
    <h1>Fazer Login</h1>

    <form action="../controller/ClienteController.php" method="POST">

        <label for="email">E-mail:</label>
        <input type="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

     

        <button type="submit">Logar</button>
        <?php
        require_once __DIR__ . '/../database.php';
        BuscarDB($db);
        ?>
    </form>
</body>
</html>