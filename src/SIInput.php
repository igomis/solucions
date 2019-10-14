<?php
/**
 * Created by PhpStorm.
 * User: igomis
 * Date: 2019-03-07
 * Time: 17:50
 */

namespace Ejercicios;


class SIInput
{
    protected $label;
    protected $name;
    protected $type;
    protected $defaultValue;

    /**
     * SIInput constructor.
     * @param $label
     * @param $name
     * @param $type
     * @param $defaultValue
     */
    public function __construct($label, $name, $type='text', $defaultValue=null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->defaultValue = $defaultValue;
    }

    public function render(){
       return "<div class=\"form-group\"><label >$this->label:</label>".$this->renderInput()."</div>";

    }

    private function renderInput(){
        if ($this->type == 'textarea')
            return "<textarea class='form-control' name='$this->name'>".$this->defaultValue."</texarea>";
        return "<input type='$this->type' name='$this->name' class='form-control' value='$this->defaultValue'>";
    }


}