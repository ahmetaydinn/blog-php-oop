<?php

return [
    'name' => 'Victor App',
    'defaultRoute' => 'home/index',
    'components' => [
        'db' => [
            'class' => 'app\components\MySqlConnection',
            'dsn' => 'mysql:host=localhost;dbname=blog',
            'username' => 'victor',
            'password' => '',
        ],
    ]
];
