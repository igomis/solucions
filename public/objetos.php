<?php
require dirname(__FILE__) . "/../vendor/autoload.php";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

include_once 'Factura.php';
include_once 'Menu.php';

$titulo = "Exercisi d'objectes";
include_once "./../view/cabecera.php";

$menu = new Menu('Principal');
$menu->setOptions(['show'=>'Arrays','link'=>'arrays.php']);
$menu->setOptions(['show'=>'Cadenas','link'=>'cadenas.php']);
$menu->setOptions(['show'=>'Funcions','link'=>'funciones.php']);
$menu->setOptions(['show'=>'Conversor','link'=>'formConversor.php']);
$menu->setOptions(['show'=>'Calculadora','link'=>'formCalculator.php']);
$menu->setOptions(['show'=>'Diccionari','link'=>'formDiccionary.php']);
$menu->setOptions(['show'=>'Persona','link'=>'formPeople.php']);
$menu->setOptions(['show'=>'Factorial','link'=>'factorial.php']);
$menu->setOptions(['show'=>'Tickets','link'=>'tickets.php']);

echo $menu->showHorit();

$factura = new Factura(1000,'12/12/2002',0.04,1);
$factura->imprime();

include_once "./../view/pie.php";