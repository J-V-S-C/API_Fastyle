<?php

echo 'Logado!';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <form action="../../controller/logOut.php" method="post">
    <p>--Produtos--</p>    
    
    <input type="submit" value="Fazer LogOut"/>

    </form>
    <form action="./EditarPerfil.php">
    <input type="submit" value="Editar Perfil"/>

    </form>
</body>
</html>