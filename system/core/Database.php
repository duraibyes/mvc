<?php
namespace Bytes\system\core;

class Database {
    public \PDO $pdo;
    public function __construct()
    {
        $dsn = getenv('DATABASE_DNS');
        $user = getenv('DATABASE_USER');
        $pass = getenv('DATABASE_PASSWORD');
        $this->pdo = new \PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        // $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);

        
    }
}