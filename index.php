<?php
session_start();

require(__DIR__ . '/autoloader.php');

$config = require(__DIR__ . '/config/main.php');
$app = \app\components\Application::getInstance($config);
$app->run();

//$app->debug(app\components\Application::app()->db);
