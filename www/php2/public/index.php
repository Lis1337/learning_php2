<?php

use App\Controllers\Index;

require __DIR__ . '/autoload.php';


$serverExplode = explode('/', $_SERVER['REQUEST_URI']);
$ctrlName = $serverExplode[1];
$methodName = $serverExplode[2];

$asd = new \App\Controllers\Article();


if (class_exists('\App\Controllers\\' . $ctrlName)) {
    $class = '\App\Controllers\\' . $ctrlName;
    $ctrlName = new $class;

    if (isset($serverExplode[2]) && method_exists($ctrlName, $methodName)) {
        $ctrlName->$methodName();
    } else {
        $ctrlName->read();
    }
} else {
    die('error 404');
}
