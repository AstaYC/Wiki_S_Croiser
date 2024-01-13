<?php
namespace App\Models;

class Tag {
    private $id ;
    private $nom;
     
    public function __construct($id,$nom){
       $this->id = $id;
       $this->nom = $nom; 
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }
}

?>