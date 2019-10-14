<?php
/**
 * Created by PhpStorm.
 * User: igomis
 * Date: 2019-03-07
 * Time: 14:27
 */

namespace Ejercicios;


class SIRadioOption extends SelectorIndividual
{

    public function render()
    {
        return "<div class=\"form-group\"><label title='$this->label' >$this->label</label>".$this->renderOptions()."</div>";
    }

    private function renderOptions()
    {
        $html = '';
        foreach ($this->elements as $value => $element) {
                $html .= "<div class=\"form-check form-check-inline\">
                    <input type='radio' value='$value' class='form-check form-check-inline'><label class='form-check-label'>".$element."</label></input></div>";
        }
        return $html;
    }
}