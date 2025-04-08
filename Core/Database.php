<?php
namespace Core;
use mysqli;

class Database implements DatabaseContract
{
    private mysqli|bool $connection;
    private string $table;

    public function __construct(array $config)
    {
        $this->connect($config['dbname'],$config['host'],$config['user'],$config['password']);
    }

    public function __destruct()
    {
        $this->disconnect();
    }

    public function table(string $tableName): void
    {
        $this->table = $tableName;
    }

    private function connect(string $databaseName,string $hostName = "localhost",string $userName = "root",string $password = ""): void
    {
        $this->connection = mysqli_connect($hostName,$userName,$password,$databaseName);
    }

    private function disconnect(): void
    {
        mysqli_close($this->connection);
    }

    public function insert(array $data)
    {
        // TODO: Implement insert() method.
    }

    public function update(array $data)
    {
        // TODO: Implement update() method.
    }

    public function select(string $column = "*")
    {
        // TODO: Implement select() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function execute()
    {
        // TODO: Implement execute() method.
    }

    public function getRow()
    {
        // TODO: Implement getRow() method.
    }

    public function getAllRows()
    {
        // TODO: Implement getAllRows() method.
    }

    public function where(string $column, string $operator, $value)
    {
        // TODO: Implement where() method.
    }

    public function andWhere(string $column, string $operator, $value)
    {
        // TODO: Implement andWhere() method.
    }

    public function orWhere(string $column, string $operator, $value)
    {
        // TODO: Implement orWhere() method.
    }
}