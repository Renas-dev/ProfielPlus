<?php

class QueryBuilder
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn->conn;
    }
}

