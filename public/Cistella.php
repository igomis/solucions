<?php


class Cistella
{
    private $productes;

    /**
     * Cistella constructor.
     */
    public function __construct()
    {
        $this->productes = array();
    }

    public function afegir($prod){
        $this->productes[] = $prod;
    }

    public function isProducte($prod){
        return array_search($prod,$this->productes);
    }

    public function esborrar($prod){
        $element =  array_search($prod,$this->productes);
        unset($this->productes[$element]);
        $this->productes = array_values($this->productes);
    }

}