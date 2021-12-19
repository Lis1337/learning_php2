<?php

namespace App;

abstract class Model
{
    public $id;
    public const TABLE = '';

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query(
            $sql,
            [],
            static::class);
    }
}