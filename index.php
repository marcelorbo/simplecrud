<?php

use Core\App;
use Core\Router;

session_start();

require_once("config.php");
require_once("core/App.php");
require_once("core/Router.php");
require_once("core/Database.php");
require_once("core/ActiveRecord.php");
require_once("core/ViewBag.php");
require_once("core/Controller.php");
require_once("core/Table.php");
require_once("core/Util.php");

$app = new App();
$app->Start();