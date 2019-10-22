<?php

function insert(string $table, array $parameters) : string
{
    $columns = implode(', ', array_keys($parameters));

    $values = "'".implode("','", array_values($parameters))."'";

    return "insert into $table ($columns) values ($values)";
}

function insertRef(string &$sql, string $table, array $parameters)
{
    $sql = str_replace ( 'tabla', $table, $sql);

    $columns = implode(', ', array_keys($parameters));
    $sql = str_replace ( 'campos', $columns, $sql);

    $values = "'".implode("','", array_values($parameters))."'";
    $sql = str_replace ( 'valores', $values, $sql);
}

function suma(int $operando1, int $operando2):int
{
    return $operando1 + $operando2;
}

function multiplicacion(int $operando1, int $operando2):int
{
    return $operando1 * $operando2;
}

function resta(int $operando1, int $operando2):int
{
    return $operando1 - $operando2;
}

function realizaOperacion(callable $operacion, string $simbolo, int $operando1, int $operando2):string
{
    $resultado = $operacion($operando1, $operando2);

    return "$operando1 $simbolo $operando2 = $resultado";
}

function calculadora(string $simbolo,int $operando1, int $operando2):string
{
    switch ($simbolo){
        case '+' : $operacion = 'suma'; break;
        case 'x' : $operacion = 'multiplicacion'; break;
        case '-' : $operacion = 'resta'; break;
        default : return null;
    }
    return realizaOperacion($operacion,$simbolo,$operando1,$operando2);
}
function dd($var){
    var_dump($var);
    exit();
}

function shuffle_assoc(&$array) {
    $keys = array_keys($array);

    shuffle($keys);

    foreach($keys as $key) {
        $new[$key] = $array[$key];
    }

    $array = $new;

    return true;
}

function str_random($length = 10) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}