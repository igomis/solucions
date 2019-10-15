<?php
require dirname(__FILE__) . "/../vendor/autoload.php";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
include_once "Producte.php";

use Ejercicios\Form;
use Ejercicios\SIInput;

session_start();

$productes = array(
    new Producte('Fenix',20,4,"fenix_2.jpg"),
    new Producte('Gandalf',30,5,"gandalf_4.jpg"),
    new Producte('Gavina',5,1,'gavina_1.jpg')
);



if ($_SERVER["REQUEST_METHOD"] == "POST") {


}


$titulo = "Tenda Virtual";
include_once "./../view/cabecera.php";

foreach ($productes as $producte)
    $producte->render();

include_once "./../view/pie.php";