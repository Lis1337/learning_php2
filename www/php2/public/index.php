<?php

require __DIR__ . '/autoload.php';


$addRow = \App\Models\Article::exec('insert', ['asdasd', 'asdasdasdasd']);
var_dump($addRow);
