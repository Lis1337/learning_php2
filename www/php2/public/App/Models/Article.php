<?php

namespace App\Models;

use App\Db;
use App\Model;

class Article extends Model
{
    public const TABLE = 'news';

    public string $title;
    public string $content;
    public int $author_id;

    public function __get(string $name)
    {
        if ($name == 'author') {
            return User::findById($this->author_id);
        }
    }
}
