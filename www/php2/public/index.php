<?php

require __DIR__ . '/autoload.php';


$serverExplode = explode('/', $_SERVER['REQUEST_URI']);
$ctrlName = $serverExplode[1];
$class = '\App\Controllers\\' . $ctrlName;

if (!class_exists($class)) {
    die('Error 404');
}

$ctrlName = new $class;
if (!isset($serverExplode[2])) {
    $ctrlName->index();

} else {
    $methodName = $serverExplode[2];
    if (!method_exists($ctrlName, $methodName)) {
        die('error 404');

    } else {
        try {
            $ctrlName->$methodName();
        } catch (\App\Exceptions\Http404Exception $ex) {
            http_response_code(404);
        }
    }
}
