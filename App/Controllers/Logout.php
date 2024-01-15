<?php
namespace App\Controllers;

class Logout {
    public static function logout(){
        session_destroy();
        header('Location:/login');
    } 
}

?>