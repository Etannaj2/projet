<?php
include_once 'Faculte.php'; 
include_once 'Emploi.php';
include_once 'Module.php';
include_once 'Type.php';
include_once 'Local.php';
include_once 'Vacataire.php';
include_once 'Personne.php';
class Tache {

        function __construct(){
            $this->conn = Faculte::connect(); 
         
        }
        // Fonction pour récupérer le vacataire associé à une tâche par l'ID de la tâche
    function getvacatairebyid($id) {
        $query = "SELECT * FROM tache WHERE id_tache = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_COLUMN);
    }
    function getEmploi($id) {
        $query = "SELECT * FROM tache WHERE id_tache = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_COLUMN);
    }
    function getModule($id) {
        $query = "SELECT * FROM tache WHERE id_tache = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    }
    function getLocal($id) {
        $query = "SELECT * FROM tache WHERE id_tache = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_COLUMN);
    }
    function getType($id) {
        $query = "SELECT * FROM tache WHERE id_tache = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_COLUMN);
    }
    function getPersonne($id) {
        $query = "SELECT * FROM tache WHERE id_tache = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_COLUMN);
    }
    }
    $tache = new Tache();
?>