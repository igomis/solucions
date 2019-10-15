<?php
require dirname(__FILE__) . "/../vendor/autoload.php";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use Ejercicios\Form;
use Ejercicios\SIInput;
session_start();



// Per afegir paraules al diccionari

if (isset($_SESSION['diccionari'])) $diccionari = $_SESSION['diccionari'];
else {
    $diccionari = ['table'=>'taula','car'=>'cotxe','winner'=>'guanyador','carpet'=>'catifa','sun'=>'sol','moon'=>'lluna','plant'=>'planta'];
    $_SESSION['diccionari'] = $diccionari;
}

// Inicialitzacio de variables
if (!isset($_SESSION['angles'])){
    shuffle_assoc($diccionari);
    $_SESSION['angles'] = array_keys(array_slice($diccionari,0,5));
    $_SESSION['valencia'] =[];
    $_SESSION['ordre'] = 0;
}

// Tractar el formulari
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['valencia'][] = $_POST['valencia'];
    //echo $_SESSION['ordre'];
    if ($_SESSION['ordre'] == 5) {
        $ok = 0;
        foreach ($_SESSION['valencia'] as $key => $value){
            if ($value == $diccionari[$_SESSION['angles'][$key]]) $ok++;
            else $errores[]='La traducció de '.$_SESSION['angles'][$key].' no es '.$value.' sino '.$diccionari[$_SESSION['angles'][$key]];
        }
        //var_dump($_SESSION);
        unset($_SESSION['angles']);
        unset($_SESSION['ordre']);
        unset($_SESSION['valencia']);

    } else $formulari = new Form([new SIInput($_SESSION['angles'][$_SESSION['ordre']++],'valencia')]);
}else $formulari = new Form([new SIInput($_SESSION['angles'][$_SESSION['ordre']++],'valencia')]);


$titulo = "Jocs Paraules";
include_once "./../view/cabecera.php";

//Pintar resultat
if (isset($errores)){
    foreach ($errores as $error) {
        echo "<p class='error'>$error</p>";
    }
}
if (isset($ok)){
    echo "<p>Tens $ok paraules ben traduides</p>";
    echo "<a href='formDiccionary.php'>Introduir paraules al diccionari</a>";
    echo "<a href='diccionari.php'>Tornar a començar</a>";
}
else $formulari->render();

include_once "./../view/pie.php";