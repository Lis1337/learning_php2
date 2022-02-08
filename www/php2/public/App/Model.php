<?php

namespace App;

use App\Models\Article;
use http\Params;

abstract class Model
{
    public const TABLE = '';

    public int $id;

    public static function findAll(): array
    {
        $db = Db::instance();
        $sql = 'SELECT * FROM' . ' ' . static::TABLE;
        return $db->query($sql, [], static::class);
    }

    public static function findById(int $id): array
    {
        $db = Db::instance();
        $sql = 'SELECT * FROM' . ' ' . static::TABLE .
            ' WHERE id = :id';
        $params['id'] = $id;
        return $db->query($sql, $params, static::class);
    }

    protected function insert()
    {
        $properties = get_object_vars($this);

        $columns  = [];
        $binds = [];
        $data = [];
        foreach ($properties as $name => $value) {
            $columns[] = $name;
            $binds[] = ':' . $name;
            $data[':' . $name] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE .
            ' (' . implode(',', $columns) .
            ') VALUES (' . implode(',', $binds) . ')';

        $db = Db::instance();
        $db->execute($sql, $data);
        $this->id = $db->lastId();
    }

    protected function update()
    {
        $properties = get_object_vars($this);
        $column = [];
        $data = [];

        foreach ($properties as $name => $value) {
            $data[':' . "$name"] = $value;
            if (!is_null($value) && $name != 'id') {
                $column[] = "$name" . ' = ' . ":$name";
            }
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET ' .
            implode(', ', $column) .
            ' WHERE id = :id';

        $db = Db::instance();
        $db->execute($sql, $data);
    }

    public function save()
    {
        if (isset($this->id)) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    public static function delete(int $id): bool
    {
        $sql = 'DELETE FROM' . ' ' . static::TABLE .
            ' WHERE id = :id';

        $params['id'] = $id;
        $db = Db::instance();
        return $db->execute($sql, $params);
    }
}
