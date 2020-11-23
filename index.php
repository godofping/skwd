<?php
set_time_limit(0);
session_start();

date_default_timezone_set('Asia/Manila');

require "Controllers/Controller.php";
require "Models/Database.php";


$config = require "Resources/config/config.php";

$dsn = "mysql:host=".$config['db_host'].";dbname=".$config['db_name'].";charset=".$config['db_charset'];
$pdo = new PDO($dsn, $config['db_user'], $config['db_password'], $config['db_options']);
$db = new Database($pdo);

$controller = new Controller($db);
$controller->index();

