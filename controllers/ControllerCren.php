<?php
require_once '../models/Creneau.php';

$adb = new Creneau();
$Creneau= $adb->getAll();

include '../views/ListCren.php';
?>