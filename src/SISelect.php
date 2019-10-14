<?php
/**
 * Created by PhpStorm.
 * User: igomis
 * Date: 2019-03-07
 * Time: 14:29
 */

namespace Ejercicios;


class SISelect extends SelectorIndividual
{
    public function render()
    {
        return "<div class=\"form-group\"><label title='$this->label'></label>$this->label</label>
            <select name='$this->name'>".$this->renderOptions()."</select></div>";
    }

    private function renderOptions()
    {
        $html = '';
        foreach ($this->elements as $value => $element) {
            if ($value === $this->defaultValue)
                $html .= "<option value='$value' selected>$element</option>";
            else
                $html .= "<option value='$value'>$element</option>";

        }
        return $html;
    }
}