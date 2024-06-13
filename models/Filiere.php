<?php
include_once 'Faculte.php'; 
include_once 'Parcours.php'; 

class Filiere{
    private $conn;
        function __construct(){
            $this->conn = Faculte::connect(); 
            
        }
        function getAll() {
            $query = "SELECT * FROM `filiere`";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        // Fonction pour récupérer un filiere par son ID
        function get($id) {
            $query = "SELECT * FROM `filiere` WHERE ID_FILIERE = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
        // Fonction pour ajouter un filiere
        function add($codefiliere, $intitulefiliere){
            $query = "INSERT INTO  `filiere`(`CODEFILIERE`, `INTITULEFILIERE`) VALUES (:codefiliere, :intitulefiliere)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':codefiliere', $codefiliere);
            $stmt->bindParam(':intitulefiliere', $intitulefiliere);
            return $stmt->execute();
        }
    
        // Fonction pour modifier un filiere
        function edit($id_filiere, $codefiliere, $intitulefiliere){
            $query = "UPDATE `filiere` SET CODEFILIERE = :codefiliere, INTITULEFILIERE = :intitulefiliere WHERE ID_FILIERE = :id_filiere";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':codefiliere', $codefiliere);
            $stmt->bindParam(':intitulefiliere', $intitulefiliere);
            $stmt->bindParam(':id_filiere', $id_filiere);
            return $stmt->execute();
        }
    
        // Fonction pour supprimer un filiere par son ID
        function delete($id){
            $query = "DELETE FROM `filiere` WHERE ID_FILIERE = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }
        public function getParcoursByFiliere($id) {
            $query = "SELECT * FROM `parcours` WHERE ID_FILIERE = :id";
            $stmt = $this->conn->prepare($query);
    
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    


   

?>