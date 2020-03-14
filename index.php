<?php

use Core\App;
use Core\Router;

session_start();

require_once("config.php");
require_once("core/Util.php");
require_once("core/App.php");
require_once("core/Router.php");
require_once("core/Database.php");
require_once("core/ActiveRecord.php");
require_once("core/ViewBag.php");
require_once("core/Controller.php");
require_once("core/File.php");
require_once("core/Image.php");
require_once("core/Mailer.php");
require_once("core/Helper.php");
require_once("core/Table.php");
require_once("core/Pagination.php");
require_once("core/Select.php");
require_once("core/Pay.php");
require_once("core/NoCSRF.php");

require_once("vendor/autoload.php");

$app = new App();
$app->Start();