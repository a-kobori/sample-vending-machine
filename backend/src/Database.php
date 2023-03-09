<?php

class Database
{
    static ?Database $instance = null;

    private PDO $pdo;

    private function __construct()
    {
        $dsn = 'mysql:dbname=test;host=db;charset=utf8';
        $user = 'root';
        $password = 'root';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $this->pdo = new PDO($dsn, $user, $password, $options);
    }

    public static function getPdo(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->pdo;
    }
}