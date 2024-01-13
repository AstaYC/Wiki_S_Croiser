<?php
   namespace App\Controllers\admin;

   use Config\Connection;
   use App\Models\wiki;
   use App\DAO\WikiDAO;

   class WikiController{
      public static function index(){
         $wiki = new WikiDAO();
         $row = $wiki->displayWiki();
         require __DIR__ . '/../../../Views/admin/Wiki.php';
      }

      public static function addWiki (){
         if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id='';
            $nom = $_POST['nom'];
            $contenu = $_POST['contenu'];
            $date = date("Y-m-d");
            $user = $_SESSION['id'];
            $categorie = $_POST['categorie'];

            $wiki = new Wiki($id,$nom,$contenu,$date,$user,$categorie);
            $add = new WikiDAO();
            $add->createWiki($wiki,1);
         }
      }

   }
?>