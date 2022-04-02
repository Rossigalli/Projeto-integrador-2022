<?php

class DBConnection
{
    private static $instance;

    private function __construct()
    {
    }

    public static function getConnection()
    {
        if (!isset(self::$instance)) {
            try {
                require 'env.php';
                self::$instance = new PDO("mysql:dbname=" . getenv("DBNAME") . ";host=" . getenv("HOST"), getenv("USER"), getenv("PASS"));
            } catch (Exception $e) {
                echo 'Error: ' . $e;
            }
        }

        return self::$instance;
    }
}
