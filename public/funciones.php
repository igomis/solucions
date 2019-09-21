<?php

require dirname(__FILE__) . "/../vendor/autoload.php";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
// variables
$tabla = 'alumnos';
$registre =  ['nombre'=>'juan', 'apellido'=>'amat','edat' => 54];
$sql = "insert into tabla (campos) values (valores)";
$op1 = 10;
$op2 = 5;

//operacions
insertRef($sql, $tabla,$registre);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Desarrollo Web con PHP 7 y MVC</title>
</head>
<body>
<h1>Tema 2: Activitat Funcions</h1>

<?= insert ($tabla, $registre) ?><br/>
<?= $sql ?><br/>
<?= calculadora( '+', 10, 5); ?><br/>
<?= calculadora( 'x', 10, 5); ?><br/>
<?= calculadora( '-', 10, 5); ?><br/>
