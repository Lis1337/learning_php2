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

    public static function exec($query, $params=[])
    {
        $table = static::TABLE;
        $columns = array_keys(get_class_vars(get_called_class()));

        if ($query == 'insert') {
            $sql = 'INSERT INTO' . ' ' . $table
                . ' (' . implode(', ', $columns) . ') '
                . 'VALUES (' . implode(', ', $params) . ')';
        } elseif ($query == 'update') {
            $sql = 'UPDATE ' . $table . ' SET '
                . $columns[array_key_first($columns)] . ' = :' . $columns[array_key_first($columns)] . ', '
                . $columns[array_key_first($columns) + 1] . ' = :' . $columns[array_key_first($columns) + 1]
                . ' WHERE id = ' . ':' . $columns[array_key_last($columns)];
        } else {echo 'undefined query';}

        var_dump($params);
        $db = new Db();
        return $db->execute(
            $sql,
            $params,
        );
    }
}
