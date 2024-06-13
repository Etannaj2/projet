<?php
require_once '../models/Filiere.php';

$adb = new Filiere();
$filieres = $adb->getAll();


include '../views/ListFili.php';
?>