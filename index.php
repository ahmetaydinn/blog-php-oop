<?php

require(__DIR__ . '/autoloader.php');

$config = require(__DIR__ . '/config/main.php');
$app = \components\Application::getInstance($config);
$app->run();

/*
echo '<pre>';
print_r(get_included_files());
echo '</pre>';
die();
 */