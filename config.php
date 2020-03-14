<?php

define( 
    "CONFIG", [
        "BASEDIR"           => str_replace('\\', '/', dirname(__FILE__)),
        "BASEURL"           => "http://localhost/simplecrud",
        "BASEFOLDER"        => "/simplecrud", 
        "BASECONTROLLER"    => "Welcome", 
        "BASEMETHOD"        => "Index",
        "BASEPARAMS"        => [],

        "DBDRIVER"          => "mysql",
        "DBHOST"            => "162.241.203.51",
        "DBPORT"            => "3306",
        "DBNAME"            => "estart83_public",
        "DBUSER"            => "estart83_public",
        "DBPASSWORD"        => "password",
        "DBOPTIONS"         => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]

    ]   
     
);

?>