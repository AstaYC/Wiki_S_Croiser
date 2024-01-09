<?php
namespace APP\Core\Connection;

use Dotenv\Dotenv;
use PDO;
use PDOExpection;

class DbConnection {
    private static $instance ;
    private $pdo ;

    public function __construct(){
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();

        $host = $_ENV['DB_HOST'];
        $root = $_ENV['DB_USER'];
        $name = $_ENV['DB_NAME'];
        $password = $_ENV['DB_PASSWORD'];
        
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$name;charset=utf8mb4", $root, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die ("la connection echoue" . $e->getMessage());
        }
        
    }

    public static function getConnection (){
        if (!self::$instance){
            self::$instance = new self() ;
        }
        return self::$instance->pdo ;
    }

}
?>