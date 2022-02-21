<?php


namespace App\Controllers;

use App\Controller;
use App\Models\Article;
use App\Models\User;


class Index extends Controller
{
    public function read()
    {
        $this->view->news = Article::findAll();
        $this->view->users = User::findAll();
        $this->view->display(__DIR__ . '/../Templates/index.php');
    }
}
