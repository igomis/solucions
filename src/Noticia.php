<?php
/**
 * Created by PhpStorm.
 * User: igomis
 * Date: 2019-10-18
 * Time: 13:12
 */

namespace Ejercicios;


class Noticia
{
    private $texto;
    private $redactor;
    private $img;
    private $widthImg;
    private $heightImg;
    private $priority;


    public function __construct($texto,$redactor,$img=null,$priority = 2,$widthImg=200,$heightImg=200){
        $this->texto = $texto;
        $this->redactor = $redactor;
        $this->img = $img;
        if ($this->img){
            $this->widthImg = $widthImg;
            $this->heightImg = $heightImg;
        } else {
            $this->widthImg = null;
            $this->heightImg = null;
        }

        $this->priority = $priority;
    }

    /**
     * @return mixed
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * @param mixed $texto
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;
    }

    /**
     * @return mixed
     */
    public function getRedactor()
    {
        return $this->redactor;
    }

    /**
     * @param mixed $redactor
     */
    public function setRedactor($redactor)
    {
        $this->redactor = $redactor;
    }

    /**
     * @return null
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param null $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return int
     */
    public function getWidthImg()
    {
        return $this->widthImg;
    }

    /**
     * @param int $widthImg
     */
    public function setWidthImg($widthImg)
    {
        $this->widthImg = $widthImg;
    }

    /**
     * @return int
     */
    public function getHeightImg()
    {
        return $this->heightImg;
    }

    /**
     * @param int $heightImg
     */
    public function setHeightImg($heightImg)
    {
        $this->heightImg = $heightImg;
    }

    /**
     * @return text
     */
    public function getPriority()
    {
        switch ($this->priority){
            case 1: return 'urgent'; break;
            case 2: return 'normal'; break;
            case 3: return 'baixa';break;
            default: return 'arxiu';
         }
    }

    public function render(){
        return "<div class='noticia ".$this->getPriority()."'>
                    <div class='texto'>$this->texto</div>
                    <div class='img'><img src='images/$this->img' height='$this->heightImg' width='$this->widthImg'></div>
                    <div class='firma'>$this->redactor</div>
            </div>";
    }


}