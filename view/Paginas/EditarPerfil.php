<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
</head>
<body>
<form action="../../controller/EditarPerfilController.php" method="POST">
    <div>   
    <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $_SESSION['nome']?>"><br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" value="<?php echo $_SESSION['telefone']?>"><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" value="<?php echo $_SESSION['cpf']?>"><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" value="<?php echo $_SESSION['email']?>"><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha"><br>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" value="<?php echo $_SESSION['endereco']?>"><br>
        <input type="submit" value="Salvar Modificações"></input>
    
</body>
</html>