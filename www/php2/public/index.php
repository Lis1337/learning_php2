<?php

require __DIR__ . '/autoload.php';

$qwe = new \App\Models\Article();
$qwe->id = 10;
$qwe->title = 'zxczxczxc';
$qwe->content = 'zxczxzxczxc';
var_dump($qwe->delete());
var_dump($qwe);