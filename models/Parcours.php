<?php
include_once 'Faculte.php'; 
include_once 'Semestre.php';
class Parcours {

        function __construct(){
            $this->conn = Faculte::connect(); 
          
        }
    
        // Fonction pour récupérer un parcours par son ID
        function get($id){
            $query = "SELECT * FROM parcours WHERE id_par = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        function getAll() {
            $query = "SELECT * FROM `parcours`";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        // Fonction pour ajouter un parcours
        function add($intituleParcours){
            $query = "INSERT INTO parcours (intituleparcours) VALUES (:intituleparcours)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':intituleparcours', $intituleParcours);
            return $stmt->execute();
        }
    
        // Fonction pour modifier un parcours
        function edit($id_parcours, $intituleParcours){
            $query = "UPDATE parcours SET intituleparcours = :intituleparcours WHERE id_par = :id_parcours";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':intituleparcours', $intituleParcours);
            $stmt->bindParam(':id_par', $id_parcours);
            return $stmt->execute();
        }
    
        // Fonction pour supprimer un parcours par son ID
        function delete($id){
            $query = "DELETE FROM parcours WHERE id_par = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }
        // Fonction pour récupérer un parcours par son ID
    function getfilierebyid($id) {
        $query = "SELECT * FROM parcours WHERE id_par = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_COLUMN);
    }
    function getSemestre($id) {
      
        $query = "SELECT * FROM `semestre` WHERE ID_PAR = :id";
            $stmt = $this->conn->prepare($query);
    
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    }
    
    // Instanciation de la classe parcours
    $parcours = new Parcours();