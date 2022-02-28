<?php


namespace App\Controllers;

use App\Controller;
use App\Models\Article as Post;
use App\Models\User;


class Admin extends Controller
{
    public function index()
    {
        $this->view->news = Post::findAll();
        $this->view->users = User::findAll();
        $this->view->display(__DIR__ . '/../Templates/admin/admin.php');
    }

    public function update()
    {
        $this->view->article = Post::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../Templates/admin/adminUpdate.php');
    }

    public function save()
    {
        $postSave = new Post();
        if (isset($_POST['id'])) {
            $postSave->id = (int) $_POST['id'];
        }
        $postSave->title = $_POST['title'];
        $postSave->content = $_POST['content'];
        $postSave->author_id = (int) $_POST['author_id'];
        $postSave->save();
        header('Location: /Admin');
    }

    public function delete()
    {
        Post::delete($_GET['id']);
        header('Location: /Admin');
    }
}
