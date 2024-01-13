<?php
namespace App\Controllers\admin;

use Config\Connection;
use App\DAO\TagDAO;
use App\Models\Tag;

class TagController {
    public static function index(){
        $display = new TagDAO();
        $row = $display->displayTag();
        require __DIR__ . '/../../../Views/admin/Tag.php' ;
    }

    public static function addTag(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id ='';
            $nom = $_POST['nom'];
            $tag = new Tag($id,$nom);
            $add = new TagDAO();
            $add->createTag($tag);

            header('Location:/tag');
        }
    }

    public static function updateTag(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
           $id = $_POST['id'];
           $nom = $_POST['nom'];
           $tag = new Tag($id,$nom);
           $update = new TagDAO();
           $update->updateTag($tag);

           header("Location:/tag");
        }
    }

    public static function deleteTag(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $delete = new TagDAO();
            $delete->deleteTag($id);

            header("Location:/tag");
        }
    }
}

?>