<?php

use App\Models\Article;

require __DIR__ . '/autoload.php';


$editPost = new Article();
if ($_POST['id']) {
    $editPost->id = $_POST['id'];
}
$editPost->title = $_POST['title'];
$editPost->content = $_POST['content'];
$editPost->author_id = $_POST['author_id'];
$editPost->save();

header('Location: http://127.0.0.1/admin.php');
