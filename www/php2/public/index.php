<?php

use App\Controllers\Index;

require __DIR__ . '/autoload.php';


$serverExplode = explode('/', $_SERVER['REQUEST_URI']);
$ctrlName = $serverExplode[1];


$class = '\App\Controllers\\' . $ctrlName;

$ctrlName = new $class();
$ctrlName();
