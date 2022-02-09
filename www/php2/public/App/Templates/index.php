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
    <table class="table-striped">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Author_id</th>
            <th>Author</th>
        </tr>
        <?php foreach ($this->news as $post) : ?>
        <tr>
            <td><?php echo $post->id ?></td>
            <td><?php echo $post->title ?></td>
            <td><?php echo $post->content ?></td>
            <td><?php echo $post->author_id ?></td>
            <td><?php foreach ($post->author as $name) {
                echo $name->name;
                } ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h1>Users</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Name</th>
        </tr>
        <tr>
            <?php foreach ($this->users as $user) : ?>
        <tr>
            <td><?php echo $user->id ?></td>
            <td><?php echo $user->email ?></td>
            <td><?php echo $user->name ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
