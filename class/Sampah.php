<?php

class Sampah extends Database {
  protected $kd_barang,
    $nama_barang,
    $harga;

  public function getAllSampah() {
    return $this->fetchData("SELECT * FROM sampah ORDER BY kd_barang ASC");
  }

  public function getSampahByKd($kd_barang) {
    $barang = $this->fetchData("SELECT * FROM sampah WHERE kd_barang='$kd_barang'");

    return $data = [
      'kd_barang' => $barang[0]['kd_barang'],
      'nama_barang' => $barang[0]['nama_barang'],
      'harga' => $barang[0]['harga']
    ];
  }

  public function addSampah($kd_barang, $nama_barang, $harga) {
    $insertBarang = $this->runQuery("INSERT INTO sampah VALUES ('$kd_barang', '$nama_barang', '$harga')");

    if (!$insertBarang) {
      echo "<script>alert(Data Sampah Gagal Ditambahkan !')</script>";
      echo "<meta content='0; url=add.php' http-equiv='refresh'>";
    } else {
      echo "<script>alert('Data Sampah Berhasil Ditambahkan !')</script>";
      echo "<meta content='0; url=index.php' http-equiv='refresh'>";
    }
  }

  public function updateSampah($getKd, $kd_barang, $nama_barang, $harga) {
    $updateSampah = $this->runQuery("UPDATE sampah SET kd_barang='$kd_barang', nama_barang='$nama_barang', harga='$harga'
		WHERE kd_barang='$getKd'");

    if (!$updateSampah) {
      echo "<script>alert('Data Sampah Gagal Diupdate !')</script>";
      echo "<meta http-equiv='refresh' content='1;>";
    }
    echo "<script>alert('Data Sampah Berhasil Diupdate !')</script>";
    echo "<meta content='0; url=index.php' http-equiv='refresh'>";
  }

  public function deleteSampah($kd_barang) {
    $deleteSampah = $this->runQuery("DELETE FROM sampah WHERE kd_barang='$kd_barang'");

    if (!$deleteSampah) {
      echo "<script>alert('Data Sampah Gagal Dihapus!')</script>";
      echo "<meta content='0; url=index.php' http-equiv='refresh'>";
    } else {
      echo "<script>alert('Data Sampah Berhasil Dihapus!')</script>";
      echo "<meta content='0; url=index.php' http-equiv='refresh'>";
    }
  }
}
