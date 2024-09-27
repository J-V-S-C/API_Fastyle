<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'Fastyle';
$websock = '/opt/lampp/var/mysql/mysql.sock';

$db = new mysqli($host, $user, $password, $dbname, 3306, $websock);
