<?php


namespace App\Controllers;

use App\Controller;
use App\Models\Article as Post;
use App\Models\User;


class Admin extends Controller
{
    protected function access(): bool
    {
        return true;
    }

    protected function handle()
    {
        if (isset($_GET['id']) && isset($_GET['delete'])) {
            $this->delete();
        } else {
            $this->readOrUpdateOrSave();
        }
    }

    protected function readOrUpdateOrSave()
    {
        if (empty($_POST) && !isset($_GET['id'])) {
            $this->view->news = Post::findAll();
            $this->view->users = User::findAll();
            $this->view->display(__DIR__ . '/../Templates/admin/admin.php');
        }
        elseif (empty($_POST) && isset($_GET['id'])) {
            $this->update();
        }
        else {
            $this->save();
        }
    }

    protected function update()
    {
        $this->view->article = Post::findById((int) $_GET['id']);
        $this->view->display(__DIR__ . '/../Templates/admin/adminEdit.php');
    }

    protected function save()
    {
        $postSave = new Post();
        if ($_POST['id']) {
            $postSave->id = (int) $_POST['id'];
        }
        $postSave->title = $_POST['title'];
        $postSave->content = $_POST['content'];
        $postSave->author_id = (int) $_POST['author_id'];
        $postSave->save();

        header('Location: http://127.0.0.1/?ctrl=Admin');
    }

    protected function delete()
    {
        Post::delete((int) $_GET['id']);
        header('Location: http://127.0.0.1/?ctrl=Admin');
    }
}
