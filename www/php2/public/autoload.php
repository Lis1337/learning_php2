<?php

function appAutoloader($class) {
    $filename =  __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    require_once $filename;
}

spl_autoload_register('appAutoloader');
