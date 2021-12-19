<?php

require __DIR__ . '/autoload.php';

$data = \App\Models\User::findAll();


echo '<pre>';
var_dump($data);
echo '</pre>';
