<?php

namespace App;

class Db
{
    protected  static $instance = null;

    protected \PDO $dbh;

    public static function instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
        $config = (include __DIR__ . '/../config.php')['db'];
        $this->dbh = new \PDO(
            'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'],
            $config['user'],
            $config['password']
        );
    }

    public function query($sql, $class): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
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
