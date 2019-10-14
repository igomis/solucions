<?php
require dirname(__FILE__) . "/../vendor/autoload.php";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use Ejercicios\Form;
use Ejercicios\SIInput;
use Ejercicios\SIRadioOption;
use Ejercicios\SISelect;

$camp1 = new SIInput('Nom','name');
$camp2 = new SIInput('Cognoms','surname');
$camp3 = new SIInput('Data Naixement','date');
$camp4 = new SISelect('Aficions','hobiies',['swing'=>'nedar','running'=>'correr','reading'=>'llegir'],'swing');
$camp5 = new SIRadioOption('Aficions','hobiies',['swing'=>'nedar','running'=>'correr','reading'=>'llegir'],'swing');

$formulari = new Form([$camp1,$camp2,$camp3,$camp4,$camp5]);


$titulo = 'Formulario con Objetos';
include_once('./../view/cabecera.php');
$formulari->render();
include_once ('./../view/pie.php');