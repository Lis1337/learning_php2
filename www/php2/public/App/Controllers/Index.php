<?php


namespace App\Controllers;

use App\Exceptions\Http404Exception;
use App\Controller;
use App\Models\Article;
use App\Models\User;


class Index extends Controller
{
    public function index()
    {
        try{
            $this->view->news = Article::findAll();
            $this->view->users = User::findAll();
        } catch (\Exception $ex) {
            throw new Http404Exception();
        }
        $this->view->display(__DIR__ . '/../Templates/index.php');
    }
}
