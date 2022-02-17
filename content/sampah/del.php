<?php
require_once '../../init.php';

$getKd = $_GET['kd'];
$sampah = new Sampah();
$sampah->deleteSampah($getKd);
