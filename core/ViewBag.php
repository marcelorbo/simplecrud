<?php

namespace Core;

class ViewBag
{
    private $content;
 
    public function __construct()
    {
        
    }
 
    public function __set($parameter, $value)
    {
        $this->content[$parameter] = $value;
    }
 
    public function __get($parameter)
    {
        return $this->content[$parameter];
    }
 
    public function __isset($parameter)
    {
        return isset($this->content[$parameter]);
    }
 
    public function __unset($parameter)
    {
        if (isset($parameter)) {
            unset($this->content[$parameter]);
            return true;
        }
        return false;
    }

}