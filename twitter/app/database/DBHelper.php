<?php
namespace App\database;

use PDO;
use PDOException;

class DBHelper
{
    private static $instance = null;

    protected $host = "localhost";
    protected $user = "root";
    protected $pass = "";
    protected $dbname = "twitter";
    private $pdo;

    private function __construct()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
        } catch (PDOException $exception) {
            echo "connect db error: ".$exception->__toString();
            die;
        }
    }

    /**
     * @return DBHelper
     */
    public static function getInstance() {
        if (self::$instance==null) {
            self::$instance = new DBHelper();
        }
        return self::$instance;
    }

    /**
     * @return PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }

}