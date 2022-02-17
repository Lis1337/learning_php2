<?php


namespace App\Controllers;

use App\Controller;
use App\Models\User;


class Users extends Controller
{
    protected function access(): bool
    {
        return true;
    }

    protected function handle()
    {
        $this->view->users = User::findAll();
        $this->view->display(__DIR__ . '/../Templates/users.php');
    }
}
