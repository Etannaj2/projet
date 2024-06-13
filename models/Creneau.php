<?php
include_once 'Faculte.php'; 
include_once 'Emploi.php';
class Creneau {

        function __construct(){
            $this->conn = Faculte::connect(); 
          
        }
    
        // Fonction pour récupérer un créneau par son ID
        function get($id){
            $query = "SELECT * FROM creneau WHERE id_creneau = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        function getAll() {
            $query = "SELECT * FROM `creneau`";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        // Fonction pour ajouter un créneau
        function add($jour, $num_seance){
            $query = "INSERT INTO creneau (jour, num_seance) VALUES (:jour, :num_seance)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':jour', $jour);
            $stmt->bindParam(':num_seance', $num_seance);
            return $stmt->execute();
        }
    
        // Fonction pour modifier un créneau
        function edit($id_creneau, $jour, $num_seance){
            $query = "UPDATE creneau SET jour = :jour, num_seance = :num_seance WHERE id_creneau = :id_creneau";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':jour', $jour);
            $stmt->bindParam(':num_seance', $num_seance);
            $stmt->bindParam(':id_creneau', $id_creneau);
            return $stmt->execute();
        }
    
        // Fonction pour supprimer un créneau par son ID
        function delete($id){
            $query = "DELETE FROM creneau WHERE id_creneau = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }
        function getEmlpoi($id) {
            $query = "SELECT id_emploi FROM creneau WHERE id_creneau = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_COLUMN);
        }
    }
    
    // Instanciation de la classe Creneau
    $creneau = new Creneau();
?>