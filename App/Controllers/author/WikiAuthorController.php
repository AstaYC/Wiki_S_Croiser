<?php
   namespace App\Controllers\author;

   use Config\Connection;
   use App\Models\wiki;
   use App\DAO\WikiDAO;
   use App\DAO\CategorieDAO;
   use App\DAO\TagDAO;

   class WikiAuthorController{
      
      public static function index(){
         $wiki = new WikiDAO();
         $row = $wiki->displayWiki();
         $categorie = new CategorieDAO;
         $cateRow =$categorie->displayCategorie();
         $tag = new TagDAO();
         $tagRow = $tag->displayTag();

         require __DIR__ . '/../../../Views/author/index.php';
      }

      public static function gererWiki(){
         
         $wiki = new WikiDAO();
         $row = $wiki->displayUserWiki();
         $categorie = new CategorieDAO;
         $cateRow =$categorie->displayCategorie();
         $tag = new TagDAO(); 
         $tagRow = $tag->displayTag();

         require __DIR__ . '/../../../Views/author/Page.php';
      }

      public static function addAuthorWiki (){
         if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $tagsSelectionnes = isset($_POST['tags']) ? $_POST['tags'] : array();
            $id='';
            $nom = $_POST['nom'];
            $contenu = $_POST['contenu'];
            $date = date("Y-m-d");
            $user = $_SESSION['id'];
            $categorie = $_POST['categorie'];

            $wiki = new Wiki($id,$nom,$contenu,$date,$user,$categorie);
            $add = new WikiDAO();
            $add->createWiki($wiki,1,$tagsSelectionnes);
         }
         header("Location:/author/parametre");
      }

      public static function deleteWiki(){
         if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $delete = new WikiDAO();
            $delete->supprimerWiki($id);
         }

         header("Location:/author/parametre");
         
      }

      public static function updateUserWiki(){
          if($_SERVER['REQUEST_METHOD'] === 'POST'){
             $tagsSelectionnes = isset($_POST['tags']) ? $_POST['tags'] : array();
             $id = $_POST['id'];
             $nom= $_POST['nom'];
             $contenu = $_POST['contenu'];
             $date = date("Y-m-d");
             $user = $_SESSION['id'];
             $categorie=$_POST['categorie'];

             $wiki = new Wiki($id,$nom,$contenu,$date,$user,$categorie);
             $update = new WikiDAO();
             $update->updateUserWiki($wiki,$tagsSelectionnes);
          } 

          header("Location:/author/parametre");
      }

   }
?>