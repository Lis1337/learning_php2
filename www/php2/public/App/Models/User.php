<?php

namespace App\Models;

use App\Db;
use App\Model;

class User extends Model
{
    public const TABLE = 'users';

    /** @var string @email */
    public string $email;

    /** @var string $name */
    public string $name;
}
