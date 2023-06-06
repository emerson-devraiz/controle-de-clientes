<?php

namespace cleanarchitecture\app\repositories\mariadb;

class MariaDB
{
    private static ?\mysqli $instance = null;
    
    private function __construct() { }

    public static function getInstance(string $host, string $user, string $password, string $database)
    {
        if (is_null(self::$instance)) {
            mysqli_report(MYSQLI_REPORT_OFF);
            
            self::$instance = new \mysqli($host, $user, $password, $database);

            if (self::$instance->connect_errno) {
                die('Erro MariaDB!');
            }

            self::$instance->set_charset("utf8");
        }

        return self::$instance;
    }
}