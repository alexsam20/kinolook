<?php

namespace Kernel\Database;

use Kernel\Database\DatabaseInterface;

class Database implements DatabaseInterface
{
    private \PDO $pdo;

    public function __construct()
    {
        $this->connect();
    }

    public function insert(string $table, array $data): int|false
    {
        // TODO: Implement insert() method.
    }

    private function connect(): void
    {
        $this->pdo = new \PDO(
            'mysql:host=localhost;port=3306;dbname=kinolook;charset=utf8mb4_general_ci',
            'alex',
            ''
        );

        /*$driver = $this->config->get('database.driver');
        $host = $this->config->get('database.host');
        $port = $this->config->get('database.port');
        $database = $this->config->get('database.database');
        $username = $this->config->get('database.username');
        $password = $this->config->get('database.password');
        $charset = $this->config->get('database.charset');

        try {
            $this->pdo = new \PDO(
                "$driver:host=$host;port=$port;dbname=$database;charset=$charset",
                $username,
                $password
            );
        } catch (\PDOException $exception) {
            exit("Database connection failed: {$exception->getMessage()}");
        }*/
    }
}