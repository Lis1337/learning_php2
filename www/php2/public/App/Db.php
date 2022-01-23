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
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function execute($sql, $params=[]): bool
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }
}
