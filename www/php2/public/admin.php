<?php

use App\Models\Article;
use App\Models\User;

require __DIR__ . '/autoload.php';


$allNews = Article::findAll();
$listId = [];

foreach ($allNews as $news) {
    echo "<br>" . 'Title: ' . $news->title . "</br>";
    echo 'Content: ' . $news->content . "</br>";
    echo 'ID: ' . $news->id . "</br>";
    echo '<a href= ' . 'delete.php?id=' . $news->id . '>' .
        '<label>delete post</label>' . '</a>' . '<br>';
    echo "</br>";
    $listId[] = $news->id;
}

$allAuthors = User::findAll();
$listAuthorId = [];

foreach ($allAuthors as $author) {
    $listAuthorId[] = $author->id;
}
?>


<form action="edit_post.php" method="post" enctype="multipart/form-data">
    <h2>Edit post or create new post</h2>
    <p>
        <?php
        echo 'Choose post id or leave blank to create new ' . '<select name="id">';
        echo '<option>' . null . '</option>';
        foreach ($listId as $id) {
            echo '<option>' . $id . '</option>';
        }
        echo '</select>';
        ?>
    </p>
    <p>
        <label for="title">Enter title
            <input type="text" name="title" size="100">
        </label>
    </p>
    <p>
        <label for="content">Content
            <input type="text" name="content" size="200">
        </label>
    </p>
    <p>
        <?php
        echo 'Choose author id ' . '<select name="author_id">';
        foreach ($listAuthorId as $AuthorId) {
            echo '<option>' . $AuthorId . '</option>';
        }
        echo '</select>';
        ?>
    </p>
    <button>submit</button>
</form>
