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
    <h1>
        Create article
    </h1>
    <form action="?ctrl=Article&id=" method="post"
          enctype="multipart/form-data">
        <p>
            <label for="author_id">
                author_id:
                <select name="author_id">
                    <?php foreach ($this->users as $user) {
                    echo '<option>' . $user->id . '</option>';
                    }
                    ?>
                </select>
            </label>
        </p>
        <p>
            <label for="title">
                title:
                <input type="text" name="title" size="100" required>
            </label>
        </p>
        <p>
            <label for="content">
                content:
                <input type="text" name="content" size="100">
            </label>
        </p>
        <button>Submit</button>
    </form>
    <h3>
        <a href="/Index">
            <button>Return to main page</button>
        </a>
    </h3>

</body>
</html>