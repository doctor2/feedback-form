<?php

namespace Core;

class Database
{
    private static $instances = [];

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): Database
    {
        $cls = static::class;
        if (!isset(static::$instances[$cls])) {
            static::$instances[$cls] = new static;
        }

        return static::$instances[$cls];
    }

    public function connectDb()
    {
        $link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT) or die("Error: " . mysql_error($link));
        if (!mysqli_set_charset($link, "utf8")) {
            printf("Error: " . mysql_error($link));
        }
        return $link;
    }
}