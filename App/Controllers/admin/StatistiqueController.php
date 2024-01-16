<?php
namespace App\Controllers\admin;

use App\DAO\CategorieDAO;
use App\DAO\WikiDAO;
use App\DAO\TagDAO;
use App\DAO\UsersDAO;


class StatistiqueController{
    public static function index(){
      $wiki = new WikiDAO();
      $user = new UsersDAO();
      $categorie = new CategorieDAO();
      $tag = new TagDAO();

      $wikiRow = $wiki->totalWiki();
      $userRow = $user->totalUser();
      $categorieRow = $categorie->totalCategorie();
      $tagRow = $tag->totalTag();

      require __DIR__ . '/../../../Views/admin/Statistique.php';
    }
}


?>