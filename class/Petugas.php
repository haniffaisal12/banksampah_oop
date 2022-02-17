<?php

class Petugas extends Database {
  protected $id_petugas,
    $nama_petugas,
    $username,
    $password;

  public function cekLogin($username, $password) {
    session_start();

    $fetch = $this->fetchData("SELECT * FROM petugas WHERE username='$username' AND password='$password'");
    $jml = $this->hitungJumlah("SELECT * FROM petugas WHERE username='$username' AND password='$password'");

    if ($jml > 0) {
      $_SESSION['username'] = $fetch[0]['username'];
      $_SESSION['password'] = $fetch[0]['password'];
      header('location: index.php');
    } else {
      echo "<p align='center'>Login Gagal</p>";
      echo "<meta  content='2; url=login.php'>";
    }
  }

  public function getAllPetugas() {
    return $this->fetchData("SELECT * FROM petugas ORDER BY id_petugas ASC");
  }
}
