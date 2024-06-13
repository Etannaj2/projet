<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Filiere Class</title>
</head>
<body>
    <h1>Testing Filiere Class</h1>

    <?php
    include_once 'Faculte.php'; 
    include_once 'Filiere.php'; 
    include_once 'Parcours.php';
    include_once 'Tache.php';
    
    $filiere = new Filiere();
    $parcours = new Parcours();
    $tache = new Tache();
    // Test add method
    echo "<h2>Testing Add Method</h2>";
    if($filiere->add('CODE01', 'Intitule Filiere 1')) {
        echo "Add operation successful!<br>";
    } else {
        echo "Add operation failed!<br>";
    }

    // Test get method
    echo "<h2>Testing Get Method</h2>";
    $result = $filiere->get(1);
    if($result) {
        echo "Get operation successful!<br>";
        echo "Result: <pre>" . print_r($result, true) . "</pre><br>";
    } else {
        echo "Get operation failed!<br>";
    }

    // Test edit method
    echo "<h2>Testing Edit Method</h2>";
    if($filiere->edit(1, 'CODE02', 'Intitule Filiere 2')) {
        echo "Edit operation successful!<br>";
    } else {
        echo "Edit operation failed!<br>";
    }

    // Test delete method
    echo "<h2>Testing Delete Method</h2>";
    if($filiere->delete(1)) {
        echo "Delete operation successful!<br>";
    } else {
        echo "Delete operation failed!<br>";
    }
    $filiereId = 2; // Remplacez par un ID valide dans votre base de données

// Appel de la méthode pour obtenir les parcours associés à la filière
$parcoursIds = $filiere->getParcoursByFiliere($filiereId);
// Affichage des résultats
echo "Les parcours associés à la filière avec ID $filiereId sont :\n";
print_r($parcoursIds);

// Instanciation de la classe Parcours


// Identifiant du parcours à tester
$parcoursId = 1; // Remplacez par un ID valide dans votre base de données

// Appel de la méthode pour obtenir la filière associée au parcours
$filiereId = $parcours->getfilierebyid($parcoursId);

// Affichage du résultat
echo "La filière associée au parcours avec ID $parcoursId est : $filiereId\n";


// Instanciation de la classe Tache


// Identifiant de la tâche à tester
$tacheId = 1; // Remplacez par un ID valide dans votre base de données

// Appel de la méthode pour obtenir le vacataire associé à la tâche
$vacataireId = $tache->getvacatairebyid($tacheId);

// Affichage du résultat
echo "Le vacataire associé à la tâche avec ID $tacheId est : $vacataireId\n";
?>