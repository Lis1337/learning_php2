<?php


namespace App\Controllers;

use App\Controller;
use App\Models\User;
use App\Models\Article as Post;


class Article extends Controller
{
    protected function access(): bool
    {
        return true;
    }

    protected function handle()
    {
        if ($_GET['id'] == null && empty($_POST)) {
            $this->create();
        } elseif (isset($_GET['id']) && isset($_GET['delete'])) {
            $this->delete();
        } else {
            $this->readOrUpdateOrSave();
        }
    }

    protected function create()
    {
        $this->view->users = User::findAll();
        $this->view->display(__DIR__ . '/../Templates/article/articleCreate.php');
    }

    protected function readOrUpdateOrSave()
    {
        if ((!isset($_GET['edit']) && empty($_POST))) {
            $this->view->article = Post::findById($_GET['id']);
            $this->view->display(__DIR__ . '/../Templates/article/article.php');

        } elseif (!empty($_POST)) {
            $this->save();

        } else {
            $this->update();
        }
    }

    protected function update()
    {
        $this->view->article = Post::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../Templates/article/articleEdit.php');
    }

    protected function save()
    {
        $postSave = new Post();
        if ($_POST['id']) {
            $postSave->id = $_POST['id'];
        }
        $postSave->title = $_POST['title'];
        $postSave->content = $_POST['content'];
        $postSave->author_id = $_POST['author_id'];
        $postSave->save();
        header('Location: http://127.0.0.1/?ctrl=Index');
    }

    protected function delete()
    {
        Post::delete($_GET['id']);
        header('Location: http://127.0.0.1/?ctrl=Index');
    }
}
