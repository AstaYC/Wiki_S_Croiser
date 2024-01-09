<?php
namespace App\DAO\UsersDAO;

use App\Core\Connection;
use App\Models\Users;

class UsersDAO {
    private $conn ;
    public function __construct(){
        $this->conn = DbConnection::getConnection();
    }

    public function createUser (Users $users){
        $query = "INSERT INTO users (nom,email,`password`,`type`) VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssss',$users->getNom(),$users->getEmail(),$users->getPassword(),$users->getType());
        if(!$stmt->execute()){
            echo "il ya un probleme de stattement " . $stmt->error();
        }
    }

    public function getUserByEmail($email){
        $query = "SELECT * FROM users WHERE email = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $email);
        if($stmt->execute()){
            echo "il ya un probleme de stattement" . $stmt->error();
        }
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row ;
    }
}

?>