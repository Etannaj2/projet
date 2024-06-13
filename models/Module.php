<?php
include_once 'Faculte.php'; 
include_once 'Tache.php';
include_once 'Semestre.php';

class Module {

        function __construct(){
            $this->conn = Faculte::connect(); 
          
        }
    
        // Fonction pour récupérer un module par son ID
        function get($id){
            $query = "SELECT * FROM module WHERE id_module = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
        // Fonction pour ajouter un module
        function add($intitulemodule){
            $query = "INSERT INTO module (intitulemodule) VALUES (:intitulemodule)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':intitulemodule', $intitulemodule);
            return $stmt->execute();
        }
    
        // Fonction pour modifier un module
        function edit($id_module, $intitulemodule){
            $query = "UPDATE module SET intitulemodule = :intitulemodule WHERE id_module = :id_module";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':intitulemodule', $intitulemodule);
            $stmt->bindParam(':id_module', $id_module);
            return $stmt->execute();
        }
    
        // Fonction pour supprimer un module par son ID
        function delete($id){
            $query = "DELETE FROM module WHERE id_module = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }
        function getTache($id) {
            $query = "SELECT * FROM tache WHERE id_module = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        }
        function getSemestre($id) {
            $query = "SELECT * FROM module WHERE id_module = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_COLUMN);
        }
    }
    
    // Instanciation de la classe module
    $module = new Module();