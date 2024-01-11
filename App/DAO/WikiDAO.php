<?php
namespace App\DAO\Wiki;

use App\Core\Connection;
use App\Models\Wiki;

class WikiDAO {
    private $conn ;
    public function __construct(){
        $this->conn = DbConnection::getConnection();
    }

    public function createWiki (Wiki $wiki){
        $query = "INSERT INTO wiki (nom,contenu,date,user_id,category_id) VALUES (?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssii",getNom(),getContenu(),getDate(),getUser(),getCategory());
        
        try{
            $stmt->execute();
        }catch(PDOException $e){
            echo "Error" . $e->getMessage();
        }
    }

    public function displayWiki (){
        $query = "SELECT * FROM wiki";
        $stmt = $this->conn->prepare($query);
        
        try{
            $stmt->execute();
        }catch(PDOException $e){
            echo "Error" . $e->getMessage();
        }
        
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row ;
    }

    public function updateWiki(wiki $wiki) {
       $query = "UPDATE wiki SET nom = ? , contenu = ? , date = ? , user_id = ? , category_id = ? WHERE id = ?";
       $stmt = $this->conn->prepare($query);
       $stmt->bind_param("sssii",getNom(),getContenu(),getDate(),getUser(),getCategory(),getId());
       
       try{
         $stmt->execute();
       }catch(PDOException $e){
           echo "Error" . $e->getMessage();
        }
    }

    public function deleteWiki($id){
       $query = "DELETE * FROM wiki WHERE id = ?";
       $stmt = $this->conn->prepare($query);
       $stmt->bind_param("i" , $id);

       try{
        $stmt->execute();
       }catch(PDOException $e){
         echo "Erreur :" . $e->getMessage();
       }
    }

}

?>