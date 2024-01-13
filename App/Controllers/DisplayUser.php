<?php
namespace App\Controllers;

use App\DAO\UsersDAO;
use Config\Connection;
use App\Models\Users;

class DisplayUser {
    public static function displayUser(){
          $display = new UsersDAO();
          $row = $display->displayUser();
          require __DIR__ . '/../../Views/admin/User.php';
    }
}

?>