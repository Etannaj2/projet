<?php

class faculte {
    private static $host = "localhost"; // Adresse du serveur de base de données
    private static $db_name = "faculte"; // Nom de la base de données
    private static $username = "root"; // Nom d'utilisateur pour se connecter à la base de données
    private static $password = ""; // Mot de passe pour se connecter à la base de données

    // Méthode statique pour établir la connexion à la base de données
    public static function connect(){
        $conn = null;

        try{
            $conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name, self::$username, self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connexion réussie !";
        }catch(PDOException $exception){
            echo "Erreur de connexion : " . $exception->getMessage();
        }

        return $conn;
    }
}

// Appel de la méthode pour établir la connexion
$connection = faculte::connect();

?>