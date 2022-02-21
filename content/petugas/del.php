<?php
require_once '../../init.php';

$id = $_GET['id'];
$petugas = new Petugas();
$petugas->deletePetugas($id);
