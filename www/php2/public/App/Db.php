<?php

namespace App;

use PDO;

class Db
{
    protected static $instance = null;

    protected PDO $dbh;

    public static function instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
        $config = new Config();
        $data = $config->data['db'];
        $this->dbh = new PDO(
            'mysql:host=' . $data['host'] .
            ';dbname=' . $data['dbname'],
            $data['user'],
            $data['password'],
        );
    }

    public function query($sql, $params=[], $class): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function execute($sql, $params=[]): bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function lastId(): int
    {
        return $this->dbh->lastInsertId();
    }
}
