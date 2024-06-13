<?php
require_once '../models/Parcours.php';

$adb = new Parcours();
$parcours = $adb->getAll();
include '../views/ListPar.php';

?>