<?php

namespace Core;

class Table
{
    private $html;    
    private $columns;
    private $rows;

    public function __construct($css = null, $template = null)
    {
        $this->columns = "";
        $this->rows = "";

        ob_start();
        include './views/Templates/'. (!empty($template) ? $template : 'Table') . '.htm';
        $this->html = ob_get_clean();
        $this->html = str_replace("{class}", (!empty($css) ? $css : 'table'), $this->html);
    }

    public function AddColumn($name, $width = null): Table
    {
        $width = !empty($width) ? $width : "30px";
        $this->columns .= "<th style=\"border:0; border-bottom: solid 1px #000; width: {$width};\">" . $name . "</th>";
        return $this;
    }

    public function AddRow($values): Table
    {
        $this->rows .= "<tr>";
        foreach($values as $value)
        {
            $this->rows .= "<td>{$value}</td>";
        }
        $this->rows .= "</tr>";
        return $this;
    }

    public function Render()
    {
        $this->html = str_replace("{columns}", $this->columns, $this->html);
        $this->html = str_replace("{rows}", $this->rows, $this->html);
        return $this->html;
    }


}