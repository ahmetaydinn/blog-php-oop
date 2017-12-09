<?php

return [
    'name'=>'Victor App',
    'defaultRoute' => 'home/index',
    'db' => [
        'class' => 'app\components\MySqlConnection',
        'dsn' => 'mysql:host=localhost;dbname=dream',
        'username' => 'victor',
        'password' => '',
    ]
];
