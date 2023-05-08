<?php
class Database {
  private $host = 'localhost';
  private $user = 'root';
  private $password = '';
  private $database = 'juniordev.liga.lomakina';
  private $connection;

  public function __construct($host, $user, $password, $database) {
    $this->host = $host;
    $this->user = $user;
    $this->password = $password;
    $this->database = $database;
}

public function connect() {
    $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);
    if ($this->connection->connect_error) {
        die("Connection failed: " . $this->connection->connect_error);
    }
}

public function query($sql) {
    $result = $this->connection->query($sql);
    if (!$result) {
        die("Query failed: " . $this->connection->error);
    }
    return $result;
}

public function escape($value) {
    return $this->connection->real_escape_string($value);
}

public function insert_id() {
    return $this->connection->insert_id;
}

public function getConnection() {
    return $this->connection;
}
}
