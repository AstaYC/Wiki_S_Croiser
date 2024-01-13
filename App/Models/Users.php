<?php
namespace App\Models;

class Users {
    private $id;
    private $nom;
    private $email;
    private $password;
    private $type;

    public function __construct($id,$nom,$email,$password,$type){
   
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->password = $password;
        $this->type = $type;

    }
    //-> GETTERS
    
    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getType(){
        return $this->type;
    }

    //->SETTERS

    public function setId($id){
        $this->id = $id ;
    }
    public function setNom($nom){
        $this->nom = $nom ;
    }
    public function setEmail($email){
        $this->email = $email ;
    }
    public function setPassword($password){
        $this->$password = $password ; 
    }
    public function setType($type){
        $this->type = $type ;
    }

}

?>