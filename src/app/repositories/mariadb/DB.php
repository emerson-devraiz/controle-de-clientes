<?php

namespace cleanarchitecture\app\repositories\mariadb;

use cleanarchitecture\app\repositories\DatabaseInterface;
use Exception;

class DB implements DatabaseInterface
{
    private ?\mysqli $instance;

    public function __construct(string $host = DB_HOST, string $user = DB_USERNAME, string $password = DB_PASSWORD, string $database = DB_DATABASE) {
        $this->instance = MariaDB::getInstance($host, $user, $password, $database);
    }

    public function getInstance(): ?\mysqli
    {
        return $this->instance;
    }

    public function lastIdInserted(): int
    {
        if (!isset($this->instance)) {
            die('Erro MariaDB!');
        }

        return $this->instance->insert_id;
    }

    public function startTransaction(): void
    {
        $this->instance->query('SET autocommit = 0;');
        $this->instance->query('START TRANSACTION;');
    }

    public function commit(): void
    {
        $this->instance->query('COMMIT;');
        $this->instance->query('SET autocommit = 1;');
    }

    public function rollback(): void
    {
        $this->instance->query('ROLLBACK;');
        $this->instance->query('SET autocommit = 1;');
    }

    public function throwException($query, $message): void
    {
        if ($query === false) {
            throw new Exception('Erro SQL: ' . $message);
        }
    }
}