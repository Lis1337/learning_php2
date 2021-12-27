<?php

require __DIR__ . '/autoload.php';


$addRow = \App\Models\Article::execute('INSERT INTO', ['asdasd', 'asdasdasdasd']);
//var_dump($addRow);

echo '<br>';

$data = \App\Models\Article::findAll();
/*

echo '<pre>';
var_dump($data);
echo '</pre>';
*/