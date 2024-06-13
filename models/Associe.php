<?php
include_once 'Faculte.php';

class Associe {

    private $conn;

    function __construct() {
        $this->conn = Faculte::connect();
        
    }
    function getSemestresByEmploi($id) {
        $query = "SELECT id_semestre FROM `associe_a5` WHERE id_emploi = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }


    function getEmploisBySemestre($id) {
        $query = "SELECT id_emploi FROM `associe_a5` WHERE id_semestre = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
?>