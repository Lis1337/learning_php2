<?php

namespace App;

class Db
{
    protected $dbh;

    public function __construct()
    {
        $config = (include __DIR__ . '/../config.php')['db'];
        $this->dbh = new \PDO(
            'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'],
            $config['user'],
            $config['password']
        );
    }

    public function query($sql, $data=[], $class)
    {
        return $this->dbh->query($sql)->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute($sql, $params=[], $columns=[]): bool
    {
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(
            ':' . $columns[array_key_first($columns)],
            $params[array_key_first($params)]
        );
        $sth->bindParam(
            ':' . $columns[array_key_first($columns) + 1],
            $params[array_key_first($params) + 1]
        );
        if (count($columns) > 2) {
            $sth->bindParam(
                ':' . $columns[array_key_last($columns)],
                $params[array_key_last($params)]
            );
        }
        return $sth->execute();
    }
}
