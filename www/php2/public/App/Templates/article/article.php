<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP-2</title>
</head>
<body>

    <h1>Article</h1>
    <article>
        <?php foreach ($this->article as $article) : ?>
        <h2>
            <?php echo 'id = ' . $article->id ?>
        </h2>
            <?php echo 'title = ' . $article->title ?>
        <p>
            <?php echo 'content = ' . $article->content ?>
        </p>
        <p>
            <?php echo 'author_id= ' . $article->author_id ?>
        </p>
        <p>
            <?php foreach ($article->author as $name) : ?>
                <?php echo 'author = ' . $name->name ?>
            <?php endforeach; ?>
        </p>
        <?php endforeach; ?>
    </article>

    <h2>
        <a href="/Index">
            Return to main page
        </a>
    </h2>

    <h3>
        <?php
        echo '<a ' . 'href="/Article/update/?id=' .
            $this->article[array_key_first($this->article)]->id . '">';
        echo 'Update article';
        echo '</a>';
        ?>
    </h3>

    <h3>
        <?php
        echo '<a ' . 'href="/Article/delete/?id=' .
            $this->article[array_key_first($this->article)]->id . '">';
        echo 'Delete article';
        echo '</a>';
        ?>
    </h3>

</body>
</html>
