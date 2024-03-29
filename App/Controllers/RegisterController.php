<?php
namespace App\Controllers;

use Config\Connection ;
use App\DAO\UsersDAO;
use App\Models\Users;

class RegisterController {
   
    public static function index() {
        require __DIR__ . '/../../Views/Register.php';
    }
    
    public static function register () {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])){

                $id ='';
                $nom = htmlspecialchars($_POST['nom']);
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                $password_2 =htmlspecialchars($_POST['password_2']);
                $type = 'author';
    
                if ($password === $password_2){
                    $passwordHached = password_hash($password,PASSWORD_DEFAULT);
                    $users = new Users($id,$nom,$email,$passwordHached,$type);
                    $register = new UsersDAO();
                    $register->createUser($users);
                    header("location:/login");
                }
        }
    }
}

?>