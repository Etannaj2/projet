<?php
require_once '../models/Filiere.php';

$adb = new Filiere();
$filiere = $adb->get($_GET['id']);

include '../views/EditFiliere.php';
?>