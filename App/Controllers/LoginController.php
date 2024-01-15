<?php
namespace App\Controllers;

use Config\Connection;
use App\Models\Users;
use App\DAO\UsersDAO;

class LoginController {
    public static function display(){
        
        require __DIR__ . '/../../Views/author/index.php';
    }

    public static function index (){
        require __DIR__ . '/../../Views/Login.php';        
    }

    public static function login () {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])){
                        
            $email = $_POST['email'];
            $password = $_POST['password'];
            $getEmail = new UsersDAO();
            $row = $getEmail->getUserByEmail($email);
        

            if ($row!==false){
        
                if(password_verify($password,$row[0]['password'])){
                    $_SESSION['email'] = $email;
                    $_SESSION['nom']=$row[0]['nom'];
                    $_SESSION['id'] = $row[0]['id'];
                    $_SESSION['type'] = $row['type'];
                    if($row[0]['type'] == 'admin'){
                        header('location:');
                    }
                    else if ($row[0]['type'] == 'author'){
                        header('location:/');
                    }
                    else{
                       echo "Il ya aucun role specifique !";
                    }
                }
                else{
                    echo "Le mot de passe est incorect !";
                }
            }
            else{
                echo "L'Email n'existe pas";
            }
        }
        else{
        echo "Les Donnees ne recuperer pas";
        }
    }
}

?>