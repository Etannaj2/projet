<?php
include_once 'Faculte.php'; // Assurez-vous d'inclure le fichier contenant la classe faculte
include_once 'Emploi.php';
include_once 'Semestre.php';
class Session {

        function __construct(){
            $this->conn = Faculte::connect(); // Utilisation de Faculte::connect() pour établir la connexion
       
        }
    
        // Fonction pour récupérer un créneau par son ID
        function get($id){
            $query = "SELECT * FROM `session` WHERE id_session = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
        // Fonction pour ajouter un créneau
        function add($anneeuniv){
            $query = "INSERT INTO `session` (anneeuniv) VALUES (:anneeuniv)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':anneeuniv', $anneeuniv);
            return $stmt->execute();
        }
    
        // Fonction pour modifier un créneau
        function edit($id_session, $anneeuniv){
            $query = "UPDATE `session` SET anneeuniv = :anneeuniv WHERE id_session = :id_session";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':anneeuniv', $anneeuniv);
            $stmt->bindParam(':id_session', $id_session);
            return $stmt->execute();
        }
    
        // Fonction pour supprimer un créneau par son ID
        function delete($id){
            $query = "DELETE FROM `session` WHERE id_session= :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }
        function getEmploi($id) {
            $query = "SELECT * FROM `session` WHERE id_session = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_COLUMN);
        }
        function getSemestre($id) {
            $query = "SELECT * FROM semestre WHERE id_par = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_COLUMN);
        }
    }
    
    // Instanciation de la classe Creneau
    $session = new Session();