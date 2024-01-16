<?php
namespace App\DAO;

use Config\Connection;
use App\Models\Users;

class UsersDAO {
    private $conn ;
    public function __construct(){
        $this->conn = Connection::getConnection();
    }

    public function createUser(Users $user){
        try {
            $query = "INSERT INTO users (nom, email, password, type) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$user->getNom(), $user->getEmail(), $user->getPassword(), $user->getType()]);
        } catch (\Exception $e) {
            echo "Error creating user: " . $e->getMessage();
        }
    }
    

    public function getUserByEmail($email){
        
      try{
        $query = "SELECT * FROM users WHERE email = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        }catch(PDOException $e){
            echo "error get message" . $e->getMessage();
        }
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

     }

    public function displayUser (){
        try{
            $query = "SELECT * FROM users";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
        }  catch (\Exception $e){
          echo "Error" . $e->getMessage();
        }
  
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function totalUser(){
        try{
            $query = "SELECT COUNT(*) AS total FROM users";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
        }  catch (\Exception $e){
          echo "Error" . $e->getMessage();
        }
  
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
}


?>