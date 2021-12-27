<?php

namespace App;

use http\Params;

abstract class Model
{
    public $id;
    public const TABLE = '';

    public static function findAll()
    {
        $db = new Db();
        $sql = 'SELECT * FROM' . ' ' . static::TABLE;
        var_dump($sql);
        return $db->query(
            $sql,
            [],
            static::class
        );
    }

    public static function execute($query, $params): bool
    {
        $db = new Db();
        $sql = $query . ' ' . static::TABLE . ' ' . 'VALUES ' . '(' . implode(', ', $params) . ')';
        var_dump($sql);
        return $db->execute(
            $sql,
            $params
        );
    }
}