<?php

require_once 'Database.php';

class Petugas {
  protected $table = 'petugas',
    $username,
    $password,
    $gapok = 1500000,
    $takehomepay,
    $db;

  public function __construct() {
    $this->db = new Database();
    $this->takehomepay = $this->gapok;
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

  public function getPetugasById($id) {
    return $this->db->fetchSingle("SELECT * FROM $this->table WHERE id_petugas='$id'");
  }

  public function addPetugas($id, $nama, $username, $password, $jabatan) {
    $insertPetugas = $this->db->execute("INSERT INTO $this->table VALUES ('$id','$nama','$username','$password','$jabatan','$this->takehomepay')");

    if (!$insertPetugas) {
      echo "<script>alert('Data Petugas Gagal Ditambahkan !')</script>";
      echo "<meta http-equiv='refresh' content='1;>";
    } else {
      echo "<script>alert('Data Petugas Berhasil Ditambahkan!')</script>";
      echo "<meta content='0; url=index.php' http-equiv='refresh'>";
    }
  }

  public function updatePetugas($getId, $id, $nama, $username, $password, $jabatan) {
    $updatePetugas = $this->db->execute("UPDATE $this->table SET id_petugas='$id', nama_petugas='$nama',
                                      username='$username', password='$password', jabatan='$jabatan', gaji='$this->takehomepay'
                                      WHERE id_petugas='$getId'");

    if (!$updatePetugas) {
      echo "<script>alert('Data Petugas Gagal Diupdate!')</script>";
      echo "<meta http-equiv='refresh' content='1;>";
    } else {
      echo "<script>alert('Data Petugas Berhasil Diupdate!')</script>";
      echo "<meta content='0; url=index.php' http-equiv='refresh'>";
    }
  }

  public function deletePetugas($id) {
    $deletePetugas = $this->db->execute("DELETE FROM $this->table WHERE id_nasabah='$id'");

    if (!$deletePetugas) {
      echo "<script>alert('Data Petugas Gagal Dihapus!')</script>";
      echo "<meta content='0; url=index.php' http-equiv='refresh'>";
    } else {
      echo "<script>alert('Data Petugas Berhasil Dihapus!')</script>";
      echo "<meta content='0; url=index.php' http-equiv='refresh'>";
    }
  }
}

class Sekretaris extends Petugas {
  private $lembur = 250000;

  public function __construct() {
    parent::__construct();
    $this->takehomepay = $this->gapok + $this->lembur;
  }
}

class Bendahara extends Petugas {
  private $bonus = 300000;

  public function __construct() {
    parent::__construct();
    $this->takehomepay = $this->gapok + $this->bonus;
  }
}

class Manajer extends Petugas {
  public function __construct() {
    parent::__construct();
    $this->takehomepay = $this->gapok * 1.5;
  }
}
