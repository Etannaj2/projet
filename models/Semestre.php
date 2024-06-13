<?php
include_once 'Faculte.php'; 
include_once 'Parcours.php';
include_once 'Session.php';
include_once 'Module.php';
class Semestre {

        function __construct(){
            $this->conn = Faculte::connect(); 
        
        }
    
        // Fonction pour récupérer un semestre par son ID
        function get($id){
            $query = "SELECT * FROM semestre WHERE id_semestre = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
        // Fonction pour ajouter un semestre
        function add($num_semestre){
            $query = "INSERT INTO semestre (num_semestre) VALUES (:num_semestre)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':num_semestre', $num_semestre);
            return $stmt->execute();
        }
    
        // Fonction pour modifier un semestre
        function edit($id_semestre, $num_semestre){
            $query = "UPDATE semestre SET num_semestre = :num_semestre WHERE id_semestre = :id_semestre";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':id_semestre', $id_semestre);
            return $stmt->execute();
        }
    
        // Fonction pour supprimer un semestre par son ID
        function delete($id){
            $query = "DELETE FROM semestre WHERE id_semestre= :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }
        function getParcours($id) {
            $query = "SELECT * FROM semestre WHERE id_semestre = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_COLUMN);
        }
        function getSession($id) {
            $query = "SELECT * FROM semestre WHERE id_semestre = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_COLUMN);
        }
        function getModule($id) {
            $query = "SELECT * FROM module WHERE id_semestre = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_COLUMN);
        }
    }
    
    // Instanciation de la classe semestre
    $semestre = new Semestre();