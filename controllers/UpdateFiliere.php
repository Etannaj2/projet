<?php
require_once '../models/Filiere.php';

$id_filiere = $_POST['id_filiere'];
$codefiliere = $_POST['codefiliere'];
$intitulefiliere = $_POST['intitulefiliere'];

if (empty($id_filiere) || empty($codefiliere) || empty($intitulefiliere)) {
    die('Tous les champs sont obligatoires.');
}

$adb = new Filiere();

$success = $adb->edit($id_filiere, $codefiliere, $intitulefiliere);

if ($success) {
    echo 'La filière a été mise à jour avec succès.';
    header('Location: ControllerFiliere.php'); 
    exit();
} else {
    echo 'Erreur lors de la mise à jour de la filière.';
}
?>
