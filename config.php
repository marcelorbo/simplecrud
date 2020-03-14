<?php

define( 
    "CONFIG", [
        "BASEDIR"           => str_replace('\\', '/', dirname(__FILE__)),
        "BASEURL"           => "http://localhost/alpha",
        "BASEFOLDER"        => "/alpha", 
        "BASECONTROLLER"    => "Welcome", 
        "BASEMETHOD"        => "Index",
        "BASEPARAMS"        => [],

        "DBDRIVER"          => "mysql",
        "DBHOST"            => "162.241.203.51",
        "DBPORT"            => "3306",
        "DBNAME"            => "estart83_estartar",
        "DBUSER"            => "estart83_sa",
        "DBPASSWORD"        => "olecram2020",
        "DBOPTIONS"         => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ],

        "MAILERHOST"          => "mail.actionlj.com.br",
        "MAILERSMTPAUTH"      => true,
        "MAILERUSER"          => "suporte@actionlj.com.br",
        "MAILERPASSWORD"      => "olecram2020",
        "MAILERSMTPSECURE"    => "ssl",
        "MAILERPORT"          => 465,
        "MAILERACCOUNT"       => "suporte@actionlj.com.br",  
        "MAILERACCOUNTNAME"   => "Action",
        "MAILERSUBJECT"       => "ACTION | Mensagem do Site",

        "PAGSEGURO_ENVIRONMENT"     => "production",
        "PAGSEGURO_EMAIL"           => "@gmail.",
        "PAGSEGURO_TOKEN"           => ""

    ]    
);

?>