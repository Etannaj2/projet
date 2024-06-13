<?php
include_once 'Faculte.php'; 
include_once 'Tache.php';
class Personne {
    private $conn;
        function __construct(){
            $this->conn = Faculte::connect(); 
          
        }
        function seconnecter($email, $pwd){
            $sql = "SELECT * FROM `personne` WHERE EMAIL = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
    
            // Récupérez l'utilisateur
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Vérifiez si l'utilisateur existe et si le mot de passe est correct
            if ($user && password_verify($pwd, $user['MDP'])) {
                // Connexion réussie
                return $user;
            } else {
                // Échec de la connexion
                return false;
            }
        }
    
        // Fonction pour récupérer une persomme par son ID
        function get($id) {
            $query = "SELECT * FROM `personne` WHERE ID_PER = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
        // Fonction pour ajouter une personne
        function add($nom,$prenom,$discipline,$disponibilite,$grade,$mdp,$email){
            $query = "INSERT INTO personne (nom,prenom,discipline,disponibilite,grade,mdp,email) VALUES (:nom,:prenom,:discipline,:disponibilite,:grade,:mdp,:email)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':discipline', $discipline);
            $stmt->bindParam(':disponibilite', $disponibilite);
            $stmt->bindParam(':grade', $grade);
            $stmt->bindParam(':mdp', $mdp);
            $stmt->bindParam(':email', $email);
            return $stmt->execute();
        }
    
        // Fonction pour modifier une personne
        function edit($id_per, $nom, $prenom,$discipline,$disponibilite,$grade,$mdp,$email){
            $query = "UPDATE personne SET nom = :nom, prenom = :prenom, discipline= :discipline, grade= :grade, mdp= :mdp, email= :email WHERE id_per = :id_per";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':discipline', $discipline);
            $stmt->bindParam(':disponibilite', $disponibilite);
            $stmt->bindParam(':grade', $grade);
            $stmt->bindParam(':mdp', $mdp);
            $stmt->bindParam(':emlail', $email);
            $stmt->bindParam(':id_per', $id_per);
            return $stmt->execute();
        }
    
        // Fonction pour supprimer une personne par son ID
        function delete($id){
            $query = "DELETE FROM personne WHERE id_per = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }
        function getTache($id) {
            $query = "SELECT * FROM tache WHERE id_per = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_COLUMN);
        }
        function getRole($id) {
            $query = "SELECT * FROM personne WHERE id_per = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_COLUMN);
        }
    }
    
    // Instanciation de la classe personne
    $personne = new Personne();