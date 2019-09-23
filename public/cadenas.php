<?php
require dirname(__FILE__) . "/../vendor/autoload.php";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Desarrollo Web con PHP 7 y MVC</title>
</head>
<body>
    <h1>Tema 1: Actividad 2</h1>
<?php
    $nombre = trim($_GET['nombre'] ?? 'Alejandro', '/');
    $letra = 'a';
    $longitudNombre = strlen($nombre);
    $nombreMayusculas = strtoupper($nombre);
    $nombreMinusculas = strtolower($nombre);
    $numApariciones = substr_count($nombre, $letra);
    $numApariciones += substr_count($nombre, strtoupper($letra));
    $posicion = stripos($nombre, $letra);
    $nombreSustituido = str_ireplace('o', '0', $nombre);

    $url = 'http://alex:password@hostname:9090/path?arg=value';
    $protocolo = parse_url($url, PHP_URL_SCHEME);
    $usuario = parse_url($url,  PHP_URL_USER);
    $path = parse_url($url,  PHP_URL_PATH);
    $query = parse_url($url,  PHP_URL_QUERY);
?>
    <p><?= $nombre ?></p>
    <p>Longitud del nombre: <?= $longitudNombre?></p>
    <p>Nombre en mayúsculas: <?= $nombreMayusculas?></p>
    <p>Nombre en minúsculas: <?= $nombreMinusculas ?></p>";

<?php
    if (isset($_GET['prefijo']))
    {
        $prefijo = $_GET['prefijo'];
        $pos = strpos($nombre, $prefijo);
        if ($pos === 0)
            echo "<p>El nombre $nombre comienza por $prefijo</p>";
        else
            echo "<p>El nombre $nombre no comienza por $prefijo</p>";
    }
?>

    <p>El nombre contiene <?= $numApariciones ?> veces la letra <?= $letra ?> (mayúscula o minúscula)</p>

<?php

    if ($posicion === false)
        echo "<p>El nombre $nombre no contiene la letra $letra (mayúscula ni minúscula)</p>";
    else
        echo "<p>La posición de la primera $letra (mayúscula o minúscula) en $nombre es $posicion </p>";
?>

    <p>Al sustituir las o por 0 el nombre queda así <?= $nombreSustituido ?></p>



    <ul>
        <li>Protocolo: <?= $protocolo ?></li>
        <li>Usuario: <?= $usuario ?></li>
        <li>Path: <?= $path ?></li>
        <li>Querystring: <?= $query ?></li>
    </ul>
?>
</body>
</html>