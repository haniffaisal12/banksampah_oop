<?php

require_once 'Database.php';

class Petugas {
  private $table = 'petugas',
    $username,
    $password,
    $db;

  public function __construct() {
    $this->db = new Database();
  }

  public function cekLogin($username, $password) {
    session_start();
    $this->username = $username;
    $this->password = $password;

    $fetch = $this->db->fetchSingle("SELECT * FROM $this->table WHERE username='$this->username' AND password='$this->password'");
    $jml = $this->db->hitungJumlah("SELECT * FROM $this->table WHERE username='$this->username' AND password='$this->password'");

    if ($jml > 0) {
      $_SESSION['username'] = $fetch['username'];
      $_SESSION['password'] = $fetch['password'];
      header('location: index.php');
    } else {
      echo "<p align='center'>Login Gagal</p>";
      echo "<meta  content='2; url=login.php'>";
    }
  }

  public function getAllPetugas() {
    return $this->db->fetchAll("SELECT * FROM $this->table ORDER BY id_petugas ASC");
  }
}
