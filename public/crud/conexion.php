<?php
/*Datos de conexion a la base de datos*/
$db_host = "localhost";
$db_post = '3306';
$db_user = "homestead";
$db_pass = "secret";
$db_name = "test";

try {
    $conn = new PDO ("mysql:host=$db_host;port=$db_post;dbname=$db_name", $db_user, $db_pass);
}catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
}