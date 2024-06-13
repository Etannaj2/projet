<?php
include_once 'Faculte.php'; 
include_once 'Personne.php';
class Role {

        function __construct(){
            $this->conn = Faculte::connect(); 
         
        }
    
        // Fonction pour récupérer un role par son ID
        function get($id){
            $query = "SELECT * FROM `role` WHERE id_role = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
        // Fonction pour ajouter un role
        function add($role){
            $query = "INSERT INTO `role` (role) VALUES (:role)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':role', $role);
            return $stmt->execute();
        }
    
        // Fonction pour modifier un role
        function edit($id_role, $role){
            $query = "UPDATE `role` SET role = :role WHERE id_role = :id_role";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':id_role', $id_role);
            return $stmt->execute();
        }
    
        // Fonction pour supprimer un role par son ID
        function delete($id){
            $query = "DELETE FROM `role` WHERE id_role = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }
        function getPersonne($id) {
            $query = "SELECT * FROM personne WHERE id_role = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_COLUMN);
        }
    }
    
    // Instanciation de la classe role
    $role = new Role();