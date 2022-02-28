<?php


spl_autoload_register(function ($class_name) {
    $base_dir = __DIR__ . '/';
    $file = $base_dir . str_replace('\\', '/', $class_name) . '.php';
    require_once $file;
});
