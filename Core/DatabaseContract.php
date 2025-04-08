<?php
namespace Core;

interface DatabaseContract
{
    public function insert(array $data);

    public function update(array $data);

    public function select(string $column = "*");

    public function delete();

    public function execute();

    public function getRow();

    public function getAllRows();

    public function where(string $column, string $operator, $value);

    public function andWhere(string $column, string $operator, $value);

    public function orWhere(string $column, string $operator, $value);
}