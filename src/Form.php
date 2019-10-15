<?php
/**
 * Created by PhpStorm.
 * User: igomis
 * Date: 2019-03-07
 * Time: 18:34
 */

namespace Ejercicios;


class Form
{
    protected $title;
    protected $components;


    /**
     * Form constructor.
     * @param $components
     */
    public function __construct($components,$title='Enviar')
    {
        $this->components = $components;
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * @param mixed $components
     */
    public function setComponents($component)
    {
        $this->components[] = $components;
    }


    public function render(){
        $html = "<form method='POST' action=''/>";
        foreach ($this->components as $component){
            $html .= $component->render()."<br>";
        }
        echo $html.'<input type="submit" name="'.$this->title.'" value="'.$this->title.'"/></form>';
    }


}