<?php

namespace App\Models;

class Wiki {
    private $id ;
    private $nom;
    private $contenu;
    private $date;
    private $user_id;
    private $category_id;

    public function __construct($id,$nom,$contenu,$date,$user_id,$category_id){
   
        $this->id = $id;
        $this->nom = $nom;
        $this->contenu = $contenu;
        $this->date = $date;
        $this->user_id = $user_id;
        $this->category_id = $category_id;

    }

    //-> GETTERS
    
    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getContenu(){
        return $this->contenu;
    }
    public function getDate(){
        return $this->date;
    }
    public function getUser(){
        return $this->user_id;
    }    
    public function getCategory(){
        return $this->category_id;
    }

    //->SETTERS

    public function setId($id){
        $this->id = $id ;
    }
    public function setNom($nom){
        $this->nom = $nom ;
    }
    public function setContenu($contenu){
        $this->contenu = $contenu ;
    }
    public function setDate($date){
        $this->$date = $date ; 
    }
    public function setUser($user_id){
        $this->user_id = $user_id;
    }    
    public function setCategory($category_id){
        $this->category_id = $category_id ;
    }

}

?>


