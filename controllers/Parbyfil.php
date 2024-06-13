<?php
require_once '../models/Filiere.php';
$id = $_GET['id'];
$adb = new Filiere();
$ParbyFil = $adb->getParcoursByFiliere($id) ;
include '../views/ListParbyFil.php';

?>