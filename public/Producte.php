<?php
/**
 * Created by PhpStorm.
 * User: igomis
 * Date: 2019-10-15
 * Time: 14:32
 */

class Producte
{
    private $id;
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
    public function __construct($id,$desc, $preu, $unitats, $imatge)
    {
        $this->id = $id;
        $this->desc = $desc;
        $this->preu = $preu;
        $this->imatge = $imatge;
        $this->unitats = $unitats;

    }

    public function render($estaCistella)
    {
        $producte = $this;
        include "./../view/producte.php";
    }

    public function getId(){
        return $this->id;
    }
}