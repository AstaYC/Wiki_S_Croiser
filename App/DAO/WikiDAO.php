<?php
namespace App\DAO;

use Config\Connection;
use App\Models\Wiki;

class WikiDAO {
    private $conn ;
    public function __construct(){
        $this->conn = Connection::getConnection();
    }

    public function createWiki (Wiki $wiki , $archived , $tag = []){
        
        try{
          $query = "INSERT INTO wiki (nom,contenu,date,user_id,categorie_id,archived) VALUES (?,?,?,?,?,?)";
          $stmt = $this->conn->prepare($query);        
          $stmt->execute([$wiki->getNom(),$wiki->getContenu(),$wiki->getDate(),$wiki->getUser(),$wiki->getCategory(),$archived]);
        }catch(PDOException $e){
            echo "Error" . $e->getMessage();
        }
        $wikiId = $this->conn->lastInsertId();
        foreach ($tag as $tag){
            $queryTag = "INSERT INTO tags_choisie (tag_id,wiki_id) VALUES (?,?)";
            $stmt =$this->conn->prepare($queryTag);
               try {
                $stmt->execute([$tag,$wikiId]);
               }catch(PDOException $e){
                  echo "ERROR" . $e->getMessage();
               }
        }
    }

    public function displayWiki(){
        try{
           $query = "SELECT wiki.* , categorie.nom AS categorie_nom , users.nom AS user_nom FROM `wiki` INNER JOIN users on users.id = user_id INNER JOIN categorie ON categorie.id = categorie_id WHERE archived = 1";
           $stmt = $this->conn->prepare($query);
           $stmt->execute();
        }catch(PDOException $e){
            echo "Error" . $e->getMessage();
        }
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC) ;
    }

    public function displayWikiArch(){
        try{
            $query = "SELECT wiki.* , categorie.nom AS categorie_nom , users.nom AS user_nom FROM `wiki` INNER JOIN users on users.id = user_id INNER JOIN categorie ON categorie.id = categorie_id WHERE archived = 0";
            $stmt = $this->conn->prepare($query);
           $stmt->execute();
        }catch(PDOException $e){
            echo "Error" . $e->getMessage();
        }
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC) ;
    }

    public function displayUserWiki(){
        try{
            $query = "SELECT wiki.* , categorie.nom AS categorie_nom , users.nom AS user_nom FROM `wiki` INNER JOIN users on users.id = user_id INNER JOIN categorie ON categorie.id = categorie_id WHERE archived = 1 AND user_id = {$_SESSION['id']}";
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
          $query = "UPDATE wiki SET archived = 0 WHERE id = ?";
          $stmt = $this->conn->prepare($query);
          $stmt->execute([$id]);
       }catch(PDOException $e){
         echo "Erreur :" . $e->getMessage();
       }
    }

    public function recupererWiki($id){
        try{
            $query = "UPDATE wiki SET archived = 1 WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id]);
         }catch(PDOException $e){
           echo "Erreur :" . $e->getMessage();
         }
    }

    public function supprimerWiki($id){
        try{
            $query = "DELETE FROM wiki WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id]);
         }catch(PDOException $e){
           echo "Erreur :" . $e->getMessage();
         }
    }

    public function updateUserWiki(wiki $wiki , $tag=[]) {
        try{
           $query = "UPDATE wiki SET nom = ? , contenu = ? , categorie_id = ? WHERE id = ?";
           $stmt = $this->conn->prepare($query);       
           $stmt->execute([$wiki->getNom(),$wiki->getContenu(),$wiki->getCategory(),$wiki->getId()]);
       }catch(PDOException $e){
           echo "Error" . $e->getMessage();
        }
        try {
            $queryDelete = "DELETE FROM tags_choisie WHERE wiki_id = ? ";
            $stmt = $this->conn->prepare($queryDelete);
            $stmt->execute([$wiki->getId()]);
        }catch(PDOException $e){
            echo "Erreur" . $e->getMessage();
        }

        foreach($tag as $tag){
            try{
                $queryTag = "INSERT INTO tags_choisie (tag_id , wiki_id) VALUES (?,?)";
                $stmt = $this->conn->prepare($queryTag);
                $stmt->execute([$tag,$wiki->getId()]);
            }catch(PDOException $e){
               echo "ERROR" . $e->getMessage();
            }
        }
    }

             public function serachWiki($keyWord){
                try{
                    $query = "SELECT wiki.*, categorie.nom AS categorie_nom, users.nom AS user_nom
                    FROM wiki
                    INNER JOIN users ON users.id = wiki.user_id
                    INNER JOIN categorie ON categorie.id = wiki.categorie_id
                    WHERE wiki.archived = 1
                    AND (wiki.nom LIKE '%$keyWord%' OR categorie.nom LIKE '%$keyWord%')
                    ";
                    $stmt = $this->conn->prepare($query);
                    $stmt->execute();
                 }catch(PDOException $e){
                     echo "Error" . $e->getMessage();
                 }
                 
                 return $stmt->fetchAll(\PDO::FETCH_ASSOC) ;
             } 
}

    
?>