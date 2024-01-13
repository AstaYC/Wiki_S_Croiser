<?php
namespace App\DAO;

use Config\Connection;
use App\Models\Wiki;

class WikiDAO {
    private $conn ;
    public function __construct(){
        $this->conn = Connection::getConnection();
    }

    public function createWiki (Wiki $wiki , $archived){
        try{
          $query = "INSERT INTO wiki (nom,contenu,date,user_id,category_id,archived) VALUES (?,?,?,?,?,?)";
          $stmt = $this->conn->prepare($query);        
          $stmt->execute([getNom(),getContenu(),getDate(),getUser(),getCategory(),$archived]);
        }catch(PDOException $e){
            echo "Error" . $e->getMessage();
        }
    }

    public function displayWiki(){
        try{
           $query = "SELECT wiki.* , categorie.* , users.* , wiki.nom AS wiki_nom ,categorie.nom AS categorie_nom , users.nom AS user_nom FROM `wiki` INNER JOIN users on users.id = user_id INNER JOIN categorie ON categorie.id = categorie_id WHERE archived = 1";
           $stmt = $this->conn->prepare($query);
           $stmt->execute();
        }catch(PDOException $e){
            echo "Error" . $e->getMessage();
        }
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC) ;
    }

    public function displayWikiArch(){
        try{
           $query = "SELECT * FROM wiki WHERE archived = 0";
           $stmt = $this->conn->prepare($query);
           $stmt->execute();
        }catch(PDOException $e){
            echo "Error" . $e->getMessage();
        }
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC) ;
    }

    public function updateWiki(wiki $wiki) {
        try{
           $query = "UPDATE wiki SET nom = ? , contenu = ? , date = ? , user_id = ? , category_id = ? WHERE id = ?";
           $stmt = $this->conn->prepare($query);       
           $stmt->execute([getNom(),getContenu(),getDate(),getUser(),getCategory(),getId()]);
       }catch(PDOException $e){
           echo "Error" . $e->getMessage();
        }
    }

    public function deleteWiki($id){
        try{
          $query = "DELETE FROM wiki WHERE id = ?";
          $stmt = $this->conn->prepare($query);
          $stmt->execute([$id]);
       }catch(PDOException $e){
         echo "Erreur :" . $e->getMessage();
       }
    }
}

?>