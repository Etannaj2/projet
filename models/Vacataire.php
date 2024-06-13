<?php
include_once 'Faculte.php'; 

class Vacataire {

        function __construct(){
            $this->conn = Faculte::connect(); 
    
        }
    
        // Fonction pour récupérer un vacataire par son ID
        function get($id){
            $query = "SELECT * FROM `type` WHERE id_type = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
        // Fonction pour ajouter un vacataire
        function add($nomvac,$prenomvac){
            $query = "INSERT INTO vacataire (nomvac,prenomvac) VALUES (:nomvac,:prenomvac)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nomvac', $nomvac);
            $stmt->bindParam(':prenomvac', $prenomvac);
            return $stmt->execute();
        }
    
        // Fonction pour modifier un vacataire
        function edit($id_vacataire, $nomvac,$prenomvac){
            $query = "UPDATE vacataire SET nomvac = :nomvac,prenomvac=:prenomvac WHERE id_vacataire= :id_vacataire";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nomvac', $nomvac);
            $stmt->bindParam(':prenomvac', $prenomvac);
            $stmt->bindParam(':id_vacataire', $id_vacataire);
            return $stmt->execute();
        }
    
        // Fonction pour supprimer un vacataire par son ID
        function delete($id){
            $query = "DELETE FROM vacataire WHERE id_vacataire= :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }
        function gettachebyid($id) {
            $query = "SELECT * FROM tache WHERE id_vacataire = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_COLUMN);
        }
    }
    
    // Instanciation de la classe vacataire
    $vacataire = new Vacataire();
    ?>