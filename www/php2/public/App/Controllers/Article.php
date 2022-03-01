<?php


namespace App\Controllers;

use App\Controller;
use App\Exceptions\Http404Exception;
use App\Models\User;
use App\Models\Article as Post;


class Article extends Controller
{
    public function create()
    {
        $this->view->users = User::findAll();
        $this->view->display(__DIR__ . '/../Templates/article/articleCreate.php');
    }

    public function read()
    {
        $this->view->article = Post::findById($_GET['id']);
        //var_dump(empty($this->view->article));
        if (empty($this->view->article)) {
            throw new Http404Exception();
        };
        $this->view->display(__DIR__ . '/../Templates/article/article.php');
    }

    public function update()
    {
        $this->view->article = Post::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../Templates/article/articleUpdate.php');
    }

    public function save()
    {
        $postSave = new Post();
        if ($_POST['id']) {
            $postSave->id = $_POST['id'];
        }
        $postSave->title = $_POST['title'];
        $postSave->content = $_POST['content'];
        $postSave->author_id = $_POST['author_id'];
        $postSave->save();
        header('Location: /Index');
    }

    public function delete()
    {
        var_dump($_GET);
        Post::delete($_GET['id']);
        header('Location: /Index');
    }
}
