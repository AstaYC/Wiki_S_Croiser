<?php

namespace App\DAO;

use Config\Connection;
use PDOException;

class WikiTagDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = Connection::getConnection();
    }

    public function displayWikiTag($id)
    {
        try {
            $query = "SELECT * FROM tags_choisie INNER JOIN tag ON tag.id = tags_choisie.tag_id WHERE wiki_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id]);
            $array = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $array;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    public function index()
    {
        if (isset($_GET['wikiId'])) {
            $array = $this->displayWikiTag($_GET['wikiId']);
            
            header("Content-Type: application/json");
            $data = json_encode($array);
            echo $data;
           
        }

        
    }
}
