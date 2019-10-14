<?php
/**
 * Created by PhpStorm.
 * User: igomis
 * Date: 2019-03-07
 * Time: 13:27
 */
namespace Ejercicios;

interface iSelectorIndividual
{
    public function __construct($label,$name,Array $elements,$defaultValue);
    public function render();
}