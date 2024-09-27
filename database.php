<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'Fastyle';
$websock = '/opt/lampp/var/mysql/mysql.sock';

$db = new mysqli($host, $user, $password, $dbname, 3306, $websock);


function BuscarDB($db)
{
    $query = 'SELECT * FROM Cliente';
    $result = $db->query($query);
    while ($row = $result->fetch_assoc()) {
        echo '<br><br>
                ' . $row['ID'] . '
                <br>' . $row['Nome'] . '
                <br>' . $row['Telefone'] . '
                <br>' . $row['CPF'] . '
                <br>' . $row['Email'] . '
                <br>' . $row['Endereco'] . '
              ';
    }
}
