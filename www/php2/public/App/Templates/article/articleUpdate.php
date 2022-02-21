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

    <?php $articleProps = $this->article[array_key_first($this->article)]; ?>
    <h1>
        Update article
    </h1>
    <form action="/Article/save/?id=<?php echo $articleProps->id ?>" method="post"
          enctype="multipart/form-data">
        <p>
            <label for="id">
                id:
                <input type="number" name="id" size="100" readonly
                       value="<?php echo $articleProps->id ?>">
            </label>
        </p>
        <p>
            <label for="author_id">
                author_id:
                <input type="number" name="author_id" size="100" readonly
                       value="<?php echo $articleProps->author_id ?>">
            </label>
        </p>
        <p>
            <label for="title">
                title:
                <input type="text" name="title" size="100" required
                       value="<?php echo $articleProps->title ?>">
            </label>
        </p>
        <p>
            <label for="content">
                content:
                <input type="text" name="content" size="100"
                       value="<?php echo $articleProps->content ?>">
            </label>
        </p>
        <button>Submit</button>
    </form>

    <p>
    <a href="/Index"><button>Return</button></a>
    </p>

</body>
</html>
