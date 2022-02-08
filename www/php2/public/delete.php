<?php

use App\Models\Article;
require __DIR__ . '/autoload.php';


Article::delete($_GET['id']);
header('Location: http://127.0.0.1/admin.php');
