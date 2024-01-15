<?php
   namespace App\Controllers\admin;

   use Config\Connection;
   use App\Models\wiki;
   use App\DAO\WikiDAO;
   use App\DAO\CategorieDAO;


   class WikiController{
      public static function index(){
         $wiki = new WikiDAO();
         $row = $wiki->displayWiki();
         $categorie = new CategorieDAO;
         $cateRow =$categorie->displayCategorie();
         require __DIR__ . '/../../../Views/admin/Wiki.php';
      }

      public static function indexArch(){
         $wikiArch = new WikiDAO();
         $row = $wikiArch->displayWikiArch();
         require __DIR__ . '/../../../Views/admin/WikiArchive.php';
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

            header("Location:/wiki");
         }
      }

      public static function deleteWiki(){
         if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $delete = new WikiDAO();
            $delete->deleteWiki($id);
         }
         header("Location:/wiki");
      }

      public static function recupererWiki(){
         if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $recuperer = new WikiDAO();
            $recuperer->recupererWiki($id);
         }
         header("Location:/wikiArchive");
      }

   }
?>