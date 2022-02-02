<?php

require __DIR__ . '/autoload.php';

/*
$asd = new \App\Models\Article();
$asd->content = 'content.test';
$asd->title = 'title.test';
$asd->insert();
*/

/*
$testRow = \App\Models\Article::findAll();
echo "<pre>";
var_dump($testRow);
echo "</pre>";
*/

/*
$testUpdate = new \App\Models\Article();
$testUpdate->id = 5;
$testUpdate->title = 'second_test';
$testUpdate->content = 'second_test';
$testUpdate->update();
*/

$qwe = new \App\Models\Article();
$qwe->id = 10;
//$qwe->title = 'zxczxczxc';
//$qwe->content = 'zxczxzxczxc';
var_dump($qwe->delete());
//var_dump($qwe);