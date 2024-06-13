<?php
require_once '../models/Parcours.php';
$id = $_GET['id'];
$adb = new Parcours();
$SembyPar = $adb->getSemestre($id) ;
include '../views/ListSembyPar.php';

?>