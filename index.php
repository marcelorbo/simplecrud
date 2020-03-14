<?php

require "config.php";
require "vendor/autoload.php";

use Core\App;
use Core\Router;

session_start();

$app = new App();
$app->Start();