<?php

require __DIR__ . '/autoload.php';


$addRow = \App\Models\Article::exec('insert', ['asdasd', 'asdasdasdasd']);
//$updateRow = \App\Models\Article::exec('update', ['firsttry', 'firsttry', 4]);

var_dump($addRow);
//var_dump($updateRow);


/*$testRow = \App\Models\User::findAll();

echo "<pre>";
var_dump($testRow);
echo "</pre>";

*/