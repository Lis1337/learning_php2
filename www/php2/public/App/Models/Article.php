<?php

namespace App\Models;

use App\Db;
use App\Model;


class Article extends Model
{
    public const TABLE = 'news';

    /** @var string $title */
    public string $title;

    /** @var string $content */
    public string $content;

    /** @var int $author_id */
    public int $author_id;

    /**
     * @return array
     * @var string $name
     */
    public function __get(string $name)
    {
        if ($name == 'author') {
            return User::findById($this->author_id);
        }
    }
}
