<?php

namespace App\Models;

class DB
{
    protected static string $host;
    protected static string $user;
    protected static string $pass;
    protected static string $name;
    protected static \mysqli $connection;

    public function __construct()
    {
        self::$host = '';
        self::$user = '';
        self::$pass = '';
        self::$name = '';
        self::$connection = self::connect();
    }

    /**
     * @return \mysqli
     */
    protected static function connect(): \mysqli
    {
        return new \mysqli(self::$host, self::$user, self::$pass, self::$name);
    }

    /**
     * @param string $sql
     * @return \mysqli_result|bool
     */
    public static function query(string $sql): \mysqli_result|bool
    {
        return self::$connection->query($sql);
    }

    /**
     * @param $sql
     * @return false|\mysqli_stmt
     */
    public function prepare($sql): false|\mysqli_stmt
    {
        return self::$connection->prepare($sql);
    }
}