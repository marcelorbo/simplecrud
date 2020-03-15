<?php

function proper($text)
{
    $strings = explode('-', $text);
    $retorno = "";

    foreach($strings as $s)
    {
        $retorno .= ucwords($s);
    }
    return $retorno;
}   

function toArray($data)
{
    $retorno = [];

    if(!empty($data)) 
    {
        if(is_array($data)) 
        {
            foreach($data as $item) 
            {
                if(is_object($item)) 
                {
                    if(get_class($item) == "stdClass") 
                    {
                        array_push($retorno, json_decode(json_encode($item), true));
                    } 
                    else 
                    {
                        array_push($retorno, $item->toArray());
                    }
                } 
                else 
                {
                    array_push($retorno, json_decode(json_encode($item), true));                        
                }
            }                
        } 
        else 
        {
            if(is_object($data)) 
            {
                if(get_class($data) == "stdClass") 
                {
                    $retorno = json_decode(json_encode($data), true);
                } 
                else 
                {
                    $retorno = $data->toArray();
                }
            } 
            else 
            {
                $retorno = json_decode(json_encode($data), true);
            }
        }
    }

    return $retorno;
}

function toDataTableArray($data)
{
    $retorno = [];
    foreach($data as $item)
    {
        // to array
        $values = [];
        $innervalues = [];
        if(get_class($item) == "stdClass") {
            $values = json_decode(json_encode($item), true);
        } else {
            $values = $item->toArray();
        }   
        // to inner array
        foreach($values as $value) 
        {
            array_push($innervalues, $value);
        }
        array_push($retorno, $innervalues);
    }     
    return $retorno;
}

function Json($data)
{
    header('Content-Type: application/json');
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}

function dateBR($param)
{
    $retorno = str_replace('/', '-', $param);
    $retorno = date("d/m/Y", strtotime($retorno));    
    return $retorno;
}

function realToFloat($brl)
{
    $source = array('.', ',');
    $replace = array('', '.');
    $brl = str_replace($source, $replace, $brl); 
    $brl = (float)$brl;
    return $brl;
}

function floatToReal($float)
{
    return number_format($float, 2, ',', '.');
}

function ageFromDate($date) 
{
    $today = date("Y-m-d");
    $diff = date_diff(date_create($date), date_create($today));
    return $diff->format('%y');
}

