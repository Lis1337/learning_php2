<?php


namespace App;


class config
{
    public array $data;

    public function __construct()
    {
        $this->data = [
            'db' => [
                'host' => 'all.mysql',
                'dbname' => 'php2',
                'user' => 'root',
                'password' => '123',
            ]
        ];
    }
}
