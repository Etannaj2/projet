<?php
include_once 'Faculte.php'; 
include_once 'Tache.php';
class Local {

        function __construct(){
            $this->conn = Faculte::connect();
          
        }
    
        // Fonction pour récupérer un local par son ID
        function get($id){
            $query = "SELECT * FROM `local` WHERE id_local = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        function getAll() {
            $query = "SELECT * FROM `Local`";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        // Fonction pour ajouter un local
        function add($nomlocal, $typelocal){
            $query = "INSERT INTO `local` (nom_local, type_local) VALUES (:nom_local, :type_local)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nom_local', $nomlocal);
            $stmt->bindParam(':type_local', $typelocal);
            return $stmt->execute();
        }
    
        // Fonction pour modifier un local
        function edit($id_local, $nomlocal, $typelocal){
            $query = "UPDATE `local` SET nom_local = :nom_local, type_local = :type_local WHERE id_local = :id_local";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nom_local', $nomlocal);
            $stmt->bindParam(':type_local', $typelocal);
            $stmt->bindParam(':id_local', $id_local);
            return $stmt->execute();
        }
    
        // Fonction pour supprimer un local par son ID
        function delete($id){
            $query = "DELETE FROM `local` WHERE id_local = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
       
    }
    function getTache($id) {
        $query = "SELECT * FROM tache WHERE id_local = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    }
    
}  
    $local = new Local();
?>