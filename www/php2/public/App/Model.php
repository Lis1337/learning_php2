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
        return $db->query($sql, static::class);
    }

    public function findById(): array
    {
        $db = Db::instance();
        $sql = 'SELECT * FROM' . ' ' . static::TABLE .
            ' WHERE id = ' . $this->id;
        return $db->query($sql, static::class);
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
            if ($name == 'id') {
                $data[':' . "$name"] = $value;
            }
            if (!is_null($value) && $name != 'id') {
                $column[] = "$name" . ' = ' . ":$name";
                $data[':' . "$name"] = $value;
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
        if ($this->findById() == null) {
            $this->insert();
        } else {$this->update();}
    }

    public function delete(): bool
    {
        if ($this->findById() != null) {
            $sql = 'DELETE FROM' . ' ' . static::TABLE .
                ' WHERE id = ' . $this->id;
        } else {return false;}

        $db = Db::instance();
        return $db->execute($sql);
    }
}
