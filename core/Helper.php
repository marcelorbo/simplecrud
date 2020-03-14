<?php

namespace Core;

class Helper
{
    public static function Rand($len = null) {
        return substr(md5(rand()), 0, $len ?? 0);
    }

    public static function realToFloat($brl)
    {
        $source = array('.', ',');
        $replace = array('', '.');
        $brl = str_replace($source, $replace, $brl); 
        $brl = (float)$brl;
        return $brl;

        // $num = 100000.50;
        // repare que o padrão é no formato americano
        // echo 'R$' . number_format($num, 2); // retorna R$100,000.50
        // nosso formato
        // echo 'R$' . number_format($num, 2, ',', '.'); // retorna R$100.000,50
        //formato americano
        // echo 'R$' . number_format($num, 2, '.', ','); // retorna R$100,000.50
    }
    
    public static function floatToReal($float)
    {
        return number_format($float, 2, ',', '.');
    }
}