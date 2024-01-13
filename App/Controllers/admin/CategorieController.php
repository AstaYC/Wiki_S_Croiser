<?php
namespace App\Controllers\admin;

use Config\Connection;
use App\DAO\CategorieDAO;
use App\Models\Categorie;

class CategorieController {
    
    public static function index () {
        $display = new CategorieDAO ;
        $row = $display->displayCategorie();
        require __DIR__ . '/../../../Views/admin/Categorie.php';
    }
    
    public static function addCategorie() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])){
            $id='';
            $nom = $_POST['nom'];
            
            $categorie = new Categorie($id,$nom);
            $add = new CategorieDAO();
            $add->createCategorie($categorie);

            header("Location:/categorie");
        }
    }

    public static function updateCategorie(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $nom = $_POST['nom'];

            $categorie = new Categorie($id,$nom);
            $update = new CategorieDAO();
            $update->updateCategorie($categorie);

            header("Location:/categorie");
        }
    }

    public static function deleteCategorie(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $delete = new CategorieDAO();
            $delete->deleteCategorie($id);

            header("Location:/categorie");
        }
    } 

}

?>  