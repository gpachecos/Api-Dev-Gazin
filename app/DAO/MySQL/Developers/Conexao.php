<?php

namespace App\DAO\MySQL\Developers;

abstract class Conexao
{
    /** 
    * @var \PDO
    */
    protected $pdo;

    public function __construct()
    {
        $host = getenv('DEVELOPERS_MYSQL_HOST');
        $port = getenv('DEVELOPERS_MYSQL_PORT');
        $user = getenv('DEVELOPERS_MYSQL_USER');
        $pass = getenv('DEVELOPERS_MYSQL_PASSWORD');
        $dbname = getenv('DEVELOPERS_MYSQL_DBNAME');

        $dsn = "mysql:host={$host};dbname={$dbname};port={$port}";

        $this->pdo = new \PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }
}