<?php
require dirname(__FILE__) . "/../vendor/autoload.php";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
session_start();
include_once 'Zona.php';


if (isset($_SESSION['zonas']))
    $zonas = unserialize($_SESSION['zonas']);
else
    $zonas = array(new Zona('Pista',1000),new Zona('Tribuna',200),new Zona('VIP',25));


$titulo = "Exercisi d'entrades";
include_once "./../view/cabecera.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $zonas[$_POST['zona']]->sellTickets((int)$_POST['entradas']);
        $_SESSION['zonas'] = serialize($zonas);
    }catch (Exception $e){
        echo $e->getMessage();
    }

}

include_once "./../view/tickets.php";
include_once "./../view/pie.php";