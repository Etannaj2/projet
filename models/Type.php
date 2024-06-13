<?php
include_once 'Faculte.php'; 
include_once 'Tache.php';
class Type {

        function __construct(){
            $this->conn = Faculte::connect(); 
  
        }
    
        // Fonction pour récupérer un type par son ID
        function get($id){
            $query = "SELECT * FROM `type` WHERE id_type = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
        // Fonction pour ajouter un type
        function add($nbheure,$nom_type){
            $query = "INSERT INTO `type` (nbheure,nom_type) VALUES (:nbheure,:nom_type)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nbheure', $nbheure);
            $stmt->bindParam(':nom_type', $nom_type);
            return $stmt->execute();
        }
    
        // Fonction pour modifier un type
        function edit($id_type, $nbheure,$nom_type){
            $query = "UPDATE `type` SET nbheure = :nbheure,nom_type=:nom_type WHERE id_type= :id_type";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nbheure', $nbheure);
            $stmt->bindParam(':nom_type', $nom_type);
            $stmt->bindParam(':id_type', $id_type);
            return $stmt->execute();
        }
    
        // Fonction pour supprimer un type par son ID
        function delete($id){
            $query = "DELETE FROM `type`WHERE id_type= :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }
        function getTache($id) {
            $query = "SELECT * FROM tache WHERE id_type = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        }
    }
    
    // Instanciation de la classe type
    $type = new Type();
    ?>