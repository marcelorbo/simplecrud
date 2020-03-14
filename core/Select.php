<?php

namespace Core;

class Select
{
    private $template; 
    private $name;
    private $options;

    public function __construct($name = null)
    {
        $this->name = is_null($name) ? "_default" : $name;
        $this->options = "";
    }

    public function addItem($item): Select
    {
        $selected = !empty($item[2]) ? ($item[1] == $item[2] ? "selected" : "") : "";
        $this->options .= "<option value='{$item[1]}' {$selected}>{$item[0]}</option>";
        return $this;
    }

    public function Render()
    {
        $retorno = "<select required='true' class='form-control custom-select' name='{$this->name}' style='border-radius: 0;'>";
        $retorno .= $this->options;
        $retorno .= "</select>";
        return $retorno;
    }

}
