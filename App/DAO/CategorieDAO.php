<?php
namespace App\DAO;

use Config\Connection;
use App\Models\Categorie;

class CategorieDAO {
    private $conn ;

    public function __construct(){
        $this->conn = Connection::getConnection();
    }

    public function createCategorie (Categorie $categorie) {
        try {     
            $query = "INSERT INTO categorie (nom) VALUE (?)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$categorie->getNom()]);
        }catch(PDOExeption $e){
            echo "Erreur" . $e->getMessage();
        }
    }

    public function displayCategorie(){
        try {
           $query = "SELECT * FROM categorie";
           $stmt = $this->conn->prepare($query);
           $stmt->execute();
        }catch(PDOExeption $e){
            echo "Error" . $e->getMessage();
        }
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function updateCategorie(Categorie $categorie){
        try {
          $query = "UPDATE categorie SET nom = ? WHERE id = ?";
          $stmt = $this->conn->prepare($query);
          $stmt->execute([$categorie->getNom(),$categorie->getId()]);
        }catch(PDOExeption $e){
            echo "Erreur" . $e->getMessage();
        }
    }

    public function deleteCategorie($id){
        try {
          $query = "DELETE FROM categorie WHERE id = ?";
          $stmt = $this->conn->prepare($query);        
          $stmt->execute([$id]);
        }catch(PDOExeption $e){
            echo "Erreur" . $e->getMessage();
        }
    }

    public function totalCategorie(){
        try{
            $query = "SELECT COUNT(*) AS total FROM categorie";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
        }  catch (\Exception $e){
          echo "Error" . $e->getMessage();
        }
  
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
}
    

?>  