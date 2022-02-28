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

    <h1>News</h1>

    <a href="/Article/create"><button>Create new post</button></a>

    <?php foreach ($this->news as $post) : ?>
        <article>
            <h2>
                <a href="/Article/read/?id=<?php echo $post->id ?>">
                    <?php echo 'id = ' . $post->id ?>
                    <?php echo 'title = ' . $post->title ?>
                </a>
            </h2>
            <p>
                <?php echo 'content = ' . $post->content ?>
            </p>
            <p>
                <?php echo 'author_id= ' . $post->author_id ?>
            </p>
            <p>
                <?php echo 'author = ' . $post->author->name; ?>
            </p>
        </article>
    <DIV STYLE="background-color:#000000; height:10px; width:100%;"></DIV>
    <?php endforeach; ?>

</body>
</html>
