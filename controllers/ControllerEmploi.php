<?php
require_once '../models/Emploi.php';

$adb = new Emploi();
$Emploi = $adb->getAll();

include '../views/ListEmp.php';
?>