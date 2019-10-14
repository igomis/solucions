<?php
require dirname(__FILE__) . "/../vendor/autoload.php";
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


function factorial($num){
    if ($num == 1) return 1;
    else return $num*factorial($num-1);
}



try{
    echo factorial(12);
}
catch (Error $e){
    echo "No se puede calcular";
}