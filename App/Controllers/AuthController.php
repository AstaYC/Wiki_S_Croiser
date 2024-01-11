<?php
namespace App\Controllers\AuthController ;

use App\Core\Connection ;
use App\DAO\UsersDAO;
use App\Models\Users;

class Authentification {
    public function joinAccess () {
        require __DIR__ . '/../../Views/Login.php';
        require __DIR__ . '/../../Views/Register.php';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(isset($_POST['register'])){
                
                $id='';
                $nom = $_POST['nom'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password_2 = $_POST['password_2'];
                $type = 'author';
    
                if ($password === $password_2){
                    $passwordHached = password_hash($password,PASSWORD_DEFAULT);
                    $users = new Users($id,$nom,$email,$passwordHached,$type);
                    $register = new UsersDAO();
                    $register->createUser($users);
                }
            }
            else if (isset($_POST['login'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $getEmail = new UsersDAO();
                $row = $getUser->getUserByEmail($email);

                if ($row->num_rows > 0){

                    if(password_verify($password,$row['password'])){
                        $_SESSION['email'] = $email;
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['type'] = $row['type'];
                        if($row['type'] == 'admin'){
                            header('location:');
                        }
                        else if ($row['type'] == 'author'){
                            header('location:');
                        }
                        else{
                           echo "il ya aucun role specifique !";
                        }
                    }
                    else{
                        echo "le mot de passe est incorect !";
                    }
                }
                else{
                    echo "L'Email n'existe pas";
                }
            }

        }
        else{
            echo "Les Donnees ne recuperer pas";
        }
    }
}
?>