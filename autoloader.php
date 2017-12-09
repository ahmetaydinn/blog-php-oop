<?php

spl_autoload_register(function ($class) {

    $class = ltrim($class, '\\');
    $arr = explode('\\', $class);
    $fileName = end($arr);

    $components_commons = __DIR__ . '/components/commons/' . $fileName . '.php';
    $components_base = __DIR__ . '/components/base/' . $fileName . '.php';
    $components = __DIR__ . '/components/' . $fileName . '.php';

    $models = __DIR__ . '/models/' . $fileName . '.php';
    $controllers = __DIR__ . 'controllers/' . $fileName . '.php';

  
    if (file_exists($components_commons)) {
        require_once $components_commons;
    }

    if (file_exists($components_base)) {
        require_once $components_base;
    }

    if (file_exists($components)) {
        require_once $components;
    }
    if (file_exists($models)) {
        require_once $models;
    }

    if (file_exists($controllers)) {
        require_once $controllers;
    }
});
