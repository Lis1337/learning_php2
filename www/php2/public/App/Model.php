<?php

namespace App;

use App\Models\Article;
use http\Params;

abstract class Model
{
    public $id;
    public const TABLE = '';

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM' . ' ' . static::TABLE;
        return $db->query(
            $sql,
            [],
            static::class
        );
    }

    public static function exec($query)
    {
        if ($query == 'insert') {
            $sql = 'INSERT INTO' . ' ' . static::TABLE . ' (title, content)' .
                " VALUES ( :params )";
        }
        var_dump($sql);

        $db = new Db();
        return $db->execute(
            $sql
        );
    }
}
