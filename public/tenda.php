<?php
require dirname(__FILE__) . "/../vendor/autoload.php";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
include_once "Producte.php";
include_once "Cistella.php";

use Ejercicios\Form;
use Ejercicios\SIInput;

session_start();


if (isset($_SESSION['cistella'])) $cistella = $_SESSION['cistella'];
else $cistella = new Cistella();

$productes = array(
    new Producte(1,'Fenix',20,4,"fenix_2.jpg"),
    new Producte(2,'Gandalf',30,5,"gandalf_4.jpg"),
    new Producte(3,'Gavina',5,1,'gavina_1.jpg')
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['afegir'])){
        $cistella->afegir($_POST['id']);
    }
    else {
        $cistella->esborrar($_POST['id']);
    }

    $_SESSION['cistella']=$cistella;

}


$titulo = "Tenda Virtual";
include_once "./../view/cabecera.php";

foreach ($productes as $producte)
    $producte->render($cistella->isProducte($producte->getId()));

include_once "./../view/pie.php";