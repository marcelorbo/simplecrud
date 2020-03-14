<?php

namespace Core;

class Image
{
    private $object;
    public $error;

    public $path;
    public $name;
    public $extension;

    function path($param): Image
    {
        try {
          $this->folder = $param;
        } 
        catch (Exception $e) {
          $this->error = $e;
        }
        return $this;
    }

    function name($param): Image
    {
        try {
            $this->name = $param;
        } 
        catch (Exception $e) {
            echo $e->getMessage();
            die();
        }      
        return $this;
    }   

    function object($param): Image
    {
        try {
            $this->object = $_FILES[$param];
        } 
        catch (Exception $e) {
            echo $e->getMessage();
            die();
        }      
        return $this;
    }

    function save()
    {
        try {
            if (!is_dir(CONFIG["BASEDIR"]. $this->folder)) {
                mkdir(CONFIG["BASEDIR"]. $this->folder, 0755, true);
            }          
            $ext = pathinfo($this->folder . basename($this->object['name']));
            $path = CONFIG["BASEDIR"]. $this->folder . basename($this->object['tmp_name'] . "." . $ext['extension']);
            if(move_uploaded_file($this->object['tmp_name'], $path)) {
                $this->path = $this->folder;
                $this->name = $this->name ?? basename($this->object['tmp_name']);
                $this->extension = $ext['extension'];
            }          
        } 
        catch (Exception $e) {
          $this->error = $e;
        }      
    }

    // TODO: 
    function load($fullpath)
    {
        header('Content-Type: image/jpeg');
        readfile(CONFIG["BASEDIR"] . $fullpath);
        die();        
    }

}