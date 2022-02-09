<?php

declare(strict_types=1);

use App\Models\Article;
use App\Models\User;

require __DIR__ . '/autoload.php';


$view = new View();

$view->news = Article::findAll();
$view->users = User::findAll();

$view->display(__DIR__ . '/App/Templates/index.php');
