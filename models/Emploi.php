<?php
include_once 'Faculte.php'; 
include_once 'Tache.php';
include_once 'Session.php';
include_once 'Creneau.php';

class Emploi {

        function __construct(){
            $this->conn = Faculte::connect(); 
           
        }
        function getAll() {
            $query = "SELECT * FROM `emploi`";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        // Fonction pour récupérer un emploi par son ID
        function get($id){
            $query = "SELECT * FROM emploi WHERE id_emploi = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
        // Fonction pour ajouter un emploi
        function add($jour, $num_groupe){
            $query = "INSERT INTO emploi (num_groupe) VALUES (:num_groupe)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':num_groupe', $num_groupe);
            return $stmt->execute();
        }
    
        // Fonction pour modifier un emploi
        function edit($id_emlpoi, $num_groupe){
            $query = "UPDATE emploi SET  num_groupe = :num_groupe WHERE id_emlpoi = :id_emploi";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':num_groupe', $num_groupe);
            $stmt->bindParam(':id_emploi', $id_emlpoi);
            return $stmt->execute();
        }
    
        // Fonction pour supprimer un emploi par son ID
        function delete($id){
            $query = "DELETE FROM emploi WHERE id_emploi = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }
        function getTache($id) {
            $query = "SELECT * FROM tache WHERE id_emploi = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        }
        function getSession($id) {
            $query = "SELECT * FROM `session` WHERE id_emploi = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_COLUMN);
        }
        function getCreneau($id) {
            $query = "SELECT * FROM creneau WHERE id_emploi = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_COLUMN);
        }
    }
    
    // Instanciation de la classe emploi
    $emploi = new Emploi();
?>