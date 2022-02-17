<?php
require_once '../../init.php';

$id = $_GET['id'];
$nasabah = new Nasabah();
$nasabah->deleteNasabah($id);
