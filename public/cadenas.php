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
    <h1>Tema 2: Activitat Cadenes</h1>
<?php
    //variables inicials
    $nombre = trim($_GET['nombre'] ?? 'Alejandro', '/');
    $prefijo = $_GET['prefijo'] ?? null;
    $letra = 'i';
    $url = 'http://alex:password@hostname:9090/path?arg=value';

    // calcul de variables

    $longitudNombre = strlen($nombre);
    $nombreMayusculas = strtoupper($nombre);
    $nombreMinusculas = strtolower($nombre);
    $numApariciones = substr_count($nombreMayusculas, strtoupper($letra));
    $posicion = stripos($nombre, $letra);
    $nombreSustituido = str_ireplace('o', '0', $nombre);

    // Provar funcio parse_url

    $protocolo = parse_url($url, PHP_URL_SCHEME);
    $usuario = parse_url($url,  PHP_URL_USER);
    $path = parse_url($url,  PHP_URL_PATH);
    $query = parse_url($url,  PHP_URL_QUERY);
?>
    <p>El teu nom és: <?= $nombre ?></p>
    <p>La Longitud del nom és: <?= $longitudNombre?></p>
    <p>Nom en majúscules: <?= $nombreMayusculas?></p>
    <p>Nom en minúscules: <?= $nombreMinusculas ?></p>

<?php
    if ($prefijo)
    {
        $pos = strpos($nombre, $prefijo);
        if ($pos === 0)
            echo "<p>El nom $nombre comença per $prefijo</p>";
        else
            echo "<p>El nom $nombre no comença per $prefijo</p>";
    } else echo "<p>No hi ha prefixe </p>";
?>

    <p>El nom conté <?= $numApariciones ?> voltes la lletra <?= $letra ?> (majúscula o minúscula)</p>

<?php

    if ($posicion === false)
        echo "<p>El nom $nombre no conté la letra $letra (ni majúscula ni minúscula)</p>";
    else
        echo "<p>La posició de la primera $letra (majúscula o minúscula) en $nombre és $posicion </p>";
?>

    <p>Al substituir les o per 0 el nom queda així <?= $nombreSustituido ?></p>
    <hr/>
    <ul>
        <li>Protocol: <?= $protocolo ?></li>
        <li>Usuari: <?= $usuario ?></li>
        <li>Path: <?= $path ?></li>
        <li>Querystring: <?= $query ?></li>
    </ul>
</body>
</html>