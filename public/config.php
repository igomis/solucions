<?php
require dirname(__FILE__) . "/../vendor/autoload.php";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

try {
    $conn = new PDO ('mysql:host=localhost;port=3306;dbname=test', 'homestead', 'secret');
}catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
}