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

      public static function search(){
         if (isset($_GET['keyWord'])){
         $wiki = new WikiDAO();
         $row = $wiki->serachWiki($_GET['keyWord']);

      foreach($row as $wiki) { ?>
            <div class="row tm-section-mb">
                <div class="col-lg-12">
                    <div class=" tm-timeline-item">
                        <div class="tm-timeline-item-inner">
                            <img src="https://wallpapercave.com/wp/wp8188619.jpg" alt="Image" class="rounded-circle tm-img-timeline">
                            <div class="tm-timeline-connector">
                                <p class="mb-0">&nbsp;</p>
                            </div>
                            <div class="tm-timeline-description-wrap">
                                <div class="tm-bg-dark tm-timeline-description">
                                    <h1 class="tm-font-400"><?=$wiki['nom']?></h1>
                                    <p class="tm-text-green float-right mb-0">Crée Par <?=$wiki['user_nom']?> . <?=$wiki['date']?></p>
                                </div>
                            </div>
                            <div class="tm-timeline-connector">
                                <p class="mb-0">&nbsp;</p>
                            </div>
                            <div class="tm-timeline-description-wrap">
                                <div class="tm-bg-dark tm-timeline-description">
                                   <button type="button" onclick="getTags('<?php echo $wiki['id']?>')" class="btn btn-dark" data-toggle="modal" data-target="#contentModel<?=$wiki['id']?>">Continuée ici</button>
                                </div>
                            </div>
                        </div>
                    
                        <div class="tm-timeline-connector-vertical"></div>
                    </div>
                </div>
            </div>

            <!-- content model -->
            <div  id ="contentModel<?=$wiki['id']?>" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    
     <div class="modal-dialog modal-lg">
        <div class="modal-content">
    <div class="container mt-4">
     <div class="row">
         <!-- Colonne pour l'image -->
         <div class="col-lg-12 text-center">
             <img src="https://wallpapercave.com/wp/wp8188619.jpg" alt="Image" class="img-fluid mb-3">
         </div>
     </div>
     <div class="row">
         <!-- Colonne pour le contenu -->
         <div class="col-lg-12">
             <h1 class="text-dark mb-3"><?=$wiki['nom']?></h1>
             <p class="text-dark"><?=$wiki['contenu']?></p>
         </div>
     </div>
     <div class="row">
         <!-- Colonne pour les catégories et les tags -->
         <div class="col-lg-12">
             <div class="mb-2">
                 <strong class="text-dark" > Les Catégories:</strong>
                 <span class="text-dark" ><?=$wiki['categorie_nom']?></span>
             </div>
             <div class="mb-2">
                 <strong class="text-dark" >Les Tags:</strong>
        
                 <span id="tag-content" class="text-dark"></span>


             </div>
         </div>
     </div>
     <div class="row">
         <!-- Colonne pour la date -->
         <div class="col-lg-12 text-right">
             
              <p class="text-dark" >Crée Par <?=$wiki['user_nom']?> . <?=$wiki['date']?></p>
         </div>
     </div>
 </div>
        </div>
      </div>
     </div>

            <?php }
         }   
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