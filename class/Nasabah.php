<?php

require_once 'Database.php';

class Nasabah {
  private $table = 'nasabah',
    $db;

  public function __construct() {
    $this->db = new Database();
  }

  public function getAllNasabah() {
    return $this->db->fetchAll("SELECT * FROM $this->table ORDER BY id_nasabah ASC");
  }

  public function getNasabahById($id) {
    return $this->db->fetchSingle("SELECT * FROM $this->table WHERE id_nasabah='$id'");
  }

  public function addNasabah($id, $nama, $alamat, $no_telepon, $saldo = 0) {
    $insertNasabah = $this->db->execute("INSERT INTO $this->table VALUES ('$id','$nama','$alamat','$no_telepon','$saldo')");

    if (!$insertNasabah) {
      echo "<script>alert('Data Nasabah Gagal Ditambahkan !')</script>";
      echo "<meta http-equiv='refresh' content='1;>";
    } else {
      echo "<script>alert('Data Nasabah Berhasil Ditambahkan!')</script>";
      echo "<meta content='0; url=index.php' http-equiv='refresh'>";
    }
  }

  public function updateNasabah($getId, $id, $nama, $alamat, $no_telepon, $saldo) {
    $updateNasabah = $this->db->execute("UPDATE $this->table SET id_nasabah='$id', nama_nasabah='$nama',
                                      alamat='$alamat', no_telp='$no_telepon', saldo='$saldo'
                                      WHERE id_nasabah='$getId'");

    if (!$updateNasabah) {
      echo "<script>alert('Data Nasabah Gagal Diupdate!')</script>";
      echo "<meta http-equiv='refresh' content='1;>";
    } else {
      echo "<script>alert('Data Nasabah Berhasil Diupdate!')</script>";
      echo "<meta content='0; url=index.php' http-equiv='refresh'>";
    }
  }

  public function deleteNasabah($id) {
    $deleteNasabah = $this->db->execute("DELETE FROM $this->table WHERE id_nasabah='$id'");

    if (!$deleteNasabah) {
      echo "<script>alert('Data Nasabah Gagal Dihapus!')</script>";
      echo "<meta content='0; url=index.php' http-equiv='refresh'>";
    } else {
      echo "<script>alert('Data Nasabah Berhasil Dihapus!')</script>";
      echo "<meta content='0; url=index.php' http-equiv='refresh'>";
    }
  }
}
