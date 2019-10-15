<?php
require dirname(__FILE__) . "/../vendor/autoload.php";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use Ejercicios\Form;
use Ejercicios\SIInput;
session_start();

$formulari = new Form([new SIInput('Usuari','usuari'),new SIInput('Password','password','password')]);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['usuari'] == 'igomis' && $_POST['password'] == '1234') {
        $_SESSION['usuari'] = $_POST['usuari'];
        header("Location: mitjana.php");
    }
    else {
        echo "Acces denegat";
    }

}

$titulo = "Login";
include_once "./../view/cabecera.php";



$formulari->render();

include_once "./../view/pie.php";