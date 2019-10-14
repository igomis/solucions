<?php
/**
 * Created by PhpStorm.
 * User: igomis
 * Date: 2019-10-06
 * Time: 19:24
 */

class Factura
{
    const IVA = 0.21;
    private $BaseI,$date,$taxes,$NetI,$state;

    /**
     * Iva constructor.
     * @param $BaseI
     * @param $date
     * @param $taxes
     * @param $NetI
     * @param $state
     */
    public function __construct($BaseI, $date, $taxes, $state)
    {
        $this->BaseI = $BaseI;
        $this->date = $date;
        $this->taxes = $taxes;
        $this->NetI = $BaseI * (1+self::IVA) + $BaseI * $taxes;
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getBaseI()
    {
        return $this->BaseI;
    }

    /**
     * @param mixed $BaseI
     */
    public function setBaseI($BaseI)
    {
        $this->BaseI = $BaseI;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getTaxes()
    {
        return $this->taxes;
    }

    /**
     * @param mixed $taxes
     */
    public function setTaxes($taxes)
    {
        $this->taxes = $taxes;
    }

    /**
     * @return mixed
     */
    public function getNetI()
    {
        return $this->NetI;
    }

    /**
     * @param mixed $NetI
     */
    public function setNetI($NetI)
    {
        $this->NetI = $NetI;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     *
     */
    public function imprime()
    {
       $factura = $this;
       $titulo = "Ejercicio Factura";
       require_once './../view/seeFactura.php';
    }

}