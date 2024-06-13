<?php
require_once '../models/Local.php';

$adb = new Local();
$local = $adb->getAll();

include '../views/ListLocal.php';
?>