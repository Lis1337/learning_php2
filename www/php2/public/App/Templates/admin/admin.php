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

    <form action="Admin/save" method="post" enctype="multipart/form-data">
        <h1>
            Create new post
        </h1>
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
            $listAuthor_id = [];

            foreach ($this->users as $author) {
                $listAuthor_id[] = $author->id;
            }

            echo 'Choose author id ' . '<select name="author_id" required>';
            foreach ($listAuthor_id as $AuthorId) {
                echo '<option>' . $AuthorId . '</option>';
            }
            echo '</select>';
            ?>
        </p>
        <button>
            submit
        </button>
    </form>

    <h1>
        All news
    </h1>

    <?php
    $listId = [];
    foreach ($this->news as $news) {
        echo '<br>' . 'Title: ' . $news->title . '</br>';
        echo 'Content: ' . $news->content . '</br>';
        echo 'ID: ' . $news->id . '</br>';
        echo '<br>' . '<a href= ' . '/Admin/update/?id=' . $news->id . '>' .
            '<button>update post</button>' . '</a>' . '</br>';
        echo '<br>';
        echo '<a href= ' . '/Admin/delete/?id=' . $news->id . '>' .
            '<button>delete post</button>' . '</a>' . '</br>';
        $listId[] = $news->id;
        echo '<DIV STYLE="background-color:#000000; height:2px; width:100%;"></DIV>';
    };
    ?>

</body>
</html>
