<?php
require_once '../models/Faculte.php';
require_once '../models/Personne.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['EMAIL']) && isset($_POST['MDP'])) {
      
        $email = $_POST['EMAIL']; 
        $pwd = $_POST['MDP'];

        $per = new Personne();
        $personne = $per->seconnecter($email, $pwd);
        if ($personne) {
          
            $_SESSION['user_id'] = $personne['ID_PER'];
            $_SESSION['user_email'] = $personne['EMAIL'];

            if ($personne['ID_PER'] == 1) {
                header('Location: ControllerFiliere.php'); // Redirect to ControllerFiliere.php
            } else {
                header('Location: Parbyfil.php'); // Redirect to par.php
            }
            exit();
        } else {
            echo 'Email ou mot de passe incorrect.';
        }
    } else {
        echo 'Veuillez remplir tous les champs.';
    }
}
require_once '../views/seconnecter.php';
?>

