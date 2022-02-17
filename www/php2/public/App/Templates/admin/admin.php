<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>All news</h1>
    <?php $listId = [];
    foreach ($this->news as $news) {
        echo "<br>" . 'Title: ' . $news->title . "</br>";
        echo 'Content: ' . $news->content . "</br>";
        echo 'ID: ' . $news->id . "</br>";
        echo '<a href= ' . '/?ctrl=Admin&id=' . $news->id . '&edit' . '>' .
            '<label>edit post</label>' . '</a>' . '<br>';
        echo '<a href= ' . '/?ctrl=Admin&id=' . $news->id . '&delete' . '>' .
            '<label>delete post</label>' . '</a>' . '</br>';
        $listId[] = $news->id;
    };

    $listAuthor_id = [];

    foreach ($this->users as $author) {
        $listAuthor_id[] = $author->id;
    } ?>


    <form action="?ctrl=Admin" method="post" enctype="multipart/form-data">
        <h2>Create new post</h2>
        <p>
            <label for="title">Enter title:
                <input type="text" name="title" size="100" required>
            </label>
        </p>
        <p>
            <label for="content">Content:
                <input type="text" name="content" size="100">
            </label>
        </p>
        <p>
            <?php
            echo 'Choose author id ' . '<select name="author_id" required>';
            foreach ($listAuthor_id as $AuthorId) {
                echo '<option>' . $AuthorId . '</option>';
            }
            echo '</select>';
            ?>
        </p>
        <button>submit</button>
    </form>

</body>
</html>