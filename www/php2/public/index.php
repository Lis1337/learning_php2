<?php

require __DIR__ . '/autoload.php';

$asd = new \App\Models\Article();
$asd->content = 'content.test';
$asd->title = 'title.test';
$asd->insert();

$testRow = \App\Models\Article::findAll();
echo "<pre>";
var_dump($testRow);
echo "</pre>";