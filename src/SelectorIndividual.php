<?php
/**
 * Created by PhpStorm.
 * User: igomis
 * Date: 2019-03-07
 * Time: 13:34
 */
namespace Ejercicios;

abstract class SelectorIndividual implements iSelectorIndividual
{
    protected $label;
    protected $name;
    protected $elements;
    protected $defaultValue;

     public function __construct($label,$name,Array $elements,$defaultValue=null){
         $this->label = $label;
         $this->name =$name;
         $this->elements = $elements;
         $this->defaultValue = $defaultValue;
     }

     abstract public function render();


}

