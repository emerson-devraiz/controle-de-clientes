<?php

namespace cleanarchitecture\app\repositories;

interface DatabaseInterface
{
    public function getInstance(): mixed;
    public function lastIdInserted(): int;
    public function startTransaction(): void;
    public function commit(): void;
    public function rollback(): void;
    public function throwException(mixed $query, string $message): void;
}