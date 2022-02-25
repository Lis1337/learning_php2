<?php

require __DIR__ . '/autoload.php';


$serverExplode = explode('/', $_SERVER['REQUEST_URI']);
$ctrlName = $serverExplode[1];

if (class_exists('\App\Controllers\\' . $ctrlName)) {
    $class = '\App\Controllers\\' . $ctrlName;
    $ctrlName = new $class;

    if (isset($serverExplode[2])) {
        $methodName = $serverExplode[2];

        if (method_exists($ctrlName, $methodName)) {
            $ctrlName->$methodName();
        }
    } else {
        $ctrlName->read();
    }

} else {
    die('error 404');
}
