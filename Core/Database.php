<?php

namespace Core;

use mysqli;

class Database implements DatabaseContract
{
    private mysqli|bool $connection;
    private string $table;
    private string $sql;

    public function __construct(array $config)
    {
        $this->connect($config['dbname'], $config['host'], $config['user'], $config['password']);
    }

    public function __destruct()
    {
        $this->disconnect();
    }

    public function table(string $tableName)
    {
        $this->table = $tableName;
        return $this;
    }

    private function connect(string $databaseName, string $hostName = "localhost", string $userName = "root", string $password = ""): void
    {
        $this->connection = mysqli_connect($hostName, $userName, $password, $databaseName);
    }

    private function disconnect(): void
    {
        mysqli_close($this->connection);
    }

    public function insert(array $data)
    {
        $values = "";
        $columns = implode("`,`", array_keys($data));
        foreach ($data as $value) {
            if (is_numeric($value)) {
                $values .= "$value ,";
            } elseif (is_bool($value)) {

                $values .= ($value) ? " 1 ," : " 0 ,";
            } else {
                $values .= "'$value' ,";
            }
        }
        $values = rtrim($values, ",");
        $this->sql = "INSERT INTO `$this->table` (`$columns`) VALUES ($values)";
//        dd($this->sql);
        return $this;
    }

    public function update(array $data)
    {
        $columns = "";
        foreach ($data as $column => $value) {
            if (is_numeric($value)) {
                $columns .= "`$column` = $value,";
            } elseif (is_bool($value)) {
                $columns .= ($value) ? "`$column` = $value, " : "`$column` = $value,";
            } else {
                $columns .= "`$column` = '$value',";
            }
        }
        $columns = rtrim($columns, ",");
        $this->sql = "UPDATE `$this->table` SET $columns";
        return $this;
    }

    public function select(string $column = "*")
    {
        $this->sql = "SELECT $column FROM `$this->table`";
        return $this;
    }

    public function delete()
    {
        $this->sql = "DELETE FROM `$this->table`";
        return $this;
    }

    public function execute()
    {
        mysqli_query($this->connection, $this->sql);
//        return mysqli_affected_rows($this->connection);
        return $this;
    }

    public function getRow(): false|array|null
    {
        $queryResult = mysqli_query($this->connection, $this->sql);
        return mysqli_fetch_assoc($queryResult);
    }

    public function getAllRows(): array
    {
        $queryResult = mysqli_query($this->connection, $this->sql);
        return mysqli_fetch_all($queryResult, MYSQLI_ASSOC);
    }

    public function where(string $column, string $operator, $value)
    {
        $this->sql .= "WHERE `$column` $operator $value";
        return $this;
    }

    public function andWhere(string $column, string $operator, $value)
    {
        $this->sql .= "AND `$column` $operator $value";
        return $this;
    }

    public function orWhere(string $column, string $operator, $value)
    {
        $this->sql .= "OR `$column` $operator $value";
        return $this;
    }
}