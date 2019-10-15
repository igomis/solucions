<?php
require dirname(__FILE__) . "/../vendor/autoload.php";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use Ejercicios\Form;
use Ejercicios\SIInput;
session_start();

if (!isset($_SESSION['usuari'])) {
    header('Location:formLogin.php');
    exit();
}

$formulari = new Form([new SIInput('Numero','number')]);
$formLogout = new Form([],'logout');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['logout'])) {
        header('Location:formLogin.php');
        $_SESSION['numeros']=[];
        $_SESSION['usuari']=null;
        session_destroy();
        exit();
    }
    if ($_POST['number'] >= 0) {
        $_SESSION['numeros'][] = $_POST['number'];
    }
    else {
        try {
            $missatge = "La media dels numeros es: ".array_sum($_SESSION['numeros'])/count($_SESSION['numeros']);
            $_SESSION['numeros']=[];
        }catch (ErrorException $e) {
            $missatge = $e->getMessage();
        }

    }

}

$titulo = "Mitjana de numeros. Usuari:".$_SESSION['usuari'];
include_once "./../view/cabecera.php";
if (isset($missatge)) echo "<p class='error'>$missatge</p>";
$formulari->render();
$formLogout->render();


include_once "./../view/pie.php";