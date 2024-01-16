<?php
namespace App\DAO;

use Config\Connection;
use App\Models\Tag; 

class TagDAO {
    private $conn ;
    
    public function __construct(){
        $this->conn = Connection::getConnection();
    }

    public function createTag(Tag $tag){
       try {
          $query = "INSERT INTO tag (nom) VALUE (?)";
          $stmt = $this->conn->prepare($query);
          $stmt->execute([$tag->getNom()]);
       
        }catch(PDOExeption $e){
         echo "Erreur" . $e->getMessage();
       }
    }

    public function displayTag(){
      
     try{
          $query = "SELECT * FROM tag";
          $stmt = $this->conn->prepare($query);
          $stmt->execute();
      }  catch (\Exception $e){
        echo "Error" . $e->getMessage();
      }

      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function updateTag(Tag $tag){
        try{
            $query = "UPDATE tag SET nom = ? WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$tag->getNom(),$tag->getId()]);
        }catch(\Exception $e){
            echo "Error" . $e->getMessage();
        }
    }

    public function deleteTag($id){
        try{
            $query = "DELETE FROM tag WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id]);
        }catch(\Exception $e){
            echo "ERROR" . $e->getMessage();
        }
    }

    public function totalTag(){
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