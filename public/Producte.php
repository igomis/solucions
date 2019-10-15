<?php
/**
 * Created by PhpStorm.
 * User: igomis
 * Date: 2019-10-15
 * Time: 14:32
 */

class Producte
{
    private $desc;
    private $preu;
    private $imatge;
    private $unitats;

    /**
     * Producte constructor.
     * @param $desc
     * @param $preu
     * @param $imatge
     */
    public function __construct($desc, $preu, $unitats, $imatge)
    {
        $this->desc = $desc;
        $this->preu = $preu;
        $this->imatge = $imatge;
        $this->unitats = $unitats;

    }

    public function render()
    {
        $producte = $this;
        include "./../view/producte.php";
    }
}