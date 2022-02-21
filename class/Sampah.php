<?php

require_once 'Database.php';

class Sampah {
  private $table = 'sampah',
    $db;

  public function __construct() {
    $this->db = new Database();
  }

  public function getAllSampah() {
    return $this->db->fetchAll("SELECT * FROM $this->table ORDER BY kd_barang ASC");
  }

  public function getSampahByKd($kd_barang) {
    return $this->db->fetchSingle("SELECT * FROM $this->table WHERE kd_barang='$kd_barang'");
  }

  public function addSampah($kd_barang, $nama_barang, $harga) {
    $insertBarang = $this->db->execute("INSERT INTO $this->table VALUES ('$kd_barang', '$nama_barang', '$harga')");

    if (!$insertBarang) {
      echo "<script>alert(Data Sampah Gagal Ditambahkan !')</script>";
      echo "<meta content='0; url=add.php' http-equiv='refresh'>";
    } else {
      echo "<script>alert('Data Sampah Berhasil Ditambahkan !')</script>";
      echo "<meta content='0; url=index.php' http-equiv='refresh'>";
    }
  }

  public function updateSampah($getKd, $kd_barang, $nama_barang, $harga) {
    $updateSampah = $this->db->execute("UPDATE $this->table SET kd_barang='$kd_barang', nama_barang='$nama_barang', harga='$harga'
		WHERE kd_barang='$getKd'");

    if (!$updateSampah) {
      echo "<script>alert('Data Sampah Gagal Diupdate !')</script>";
      echo "<meta http-equiv='refresh' content='1;>";
    }
    echo "<script>alert('Data Sampah Berhasil Diupdate !')</script>";
    echo "<meta content='0; url=index.php' http-equiv='refresh'>";
  }

  public function deleteSampah($kd_barang) {
    $deleteSampah = $this->db->execute("DELETE FROM $this->table WHERE kd_barang='$kd_barang'");

    if (!$deleteSampah) {
      echo "<script>alert('Data Sampah Gagal Dihapus!')</script>";
      echo "<meta content='0; url=index.php' http-equiv='refresh'>";
    } else {
      echo "<script>alert('Data Sampah Berhasil Dihapus!')</script>";
      echo "<meta content='0; url=index.php' http-equiv='refresh'>";
    }
  }
}
