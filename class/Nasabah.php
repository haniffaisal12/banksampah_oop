<?php

class Nasabah extends Database {
  protected $idnasabah,
    $namanasabah,
    $alamat,
    $notelepon,
    $saldo;

  public function getAllNasabah() {
    return $this->fetchData("SELECT * FROM nasabah ORDER BY id_nasabah ASC");
  }

  public function getNasabahById($id) {
    $nasabah = $this->fetchData("SELECT * FROM nasabah WHERE id_nasabah='$id'");

    return $data = [
      'id_nasabah' => $nasabah[0]['id_nasabah'],
      'nama_nasabah' => $nasabah[0]['nama_nasabah'],
      'alamat' => $nasabah[0]['alamat'],
      'no_telp' => $nasabah[0]['no_telp'],
      'saldo' => $nasabah[0]['saldo'],
    ];
  }

  public function addNasabah($id, $nama, $alamat, $no_telepon, $saldo = 0) {
    $insertNasabah = $this->runQuery("INSERT INTO nasabah VALUES ('$id','$nama','$alamat','$no_telepon','$saldo')");

    if (!$insertNasabah) {
      echo "<script>alert('Data Nasabah Gagal Ditambahkan !')</script>";
      echo "<meta http-equiv='refresh' content='1;>";
    } else {
      echo "<script>alert('Data Nasabah Berhasil Ditambahkan!')</script>";
      echo "<meta content='0; url=index.php' http-equiv='refresh'>";
    }
  }

  public function updateNasabah($getId, $id, $nama, $alamat, $no_telepon, $saldo) {
    $updateNasabah = $this->runQuery("UPDATE nasabah SET nama_nasabah='$nama', alamat='$alamat',
                                      no_telp='$no_telepon', saldo='$saldo'
                                      WHERE id_nasabah='$getId'");

    if (!$updateNasabah) {
      echo "<script>alert('Data Nasabah Gagal Diupdate!')</script>";
      echo "<meta http-equiv='refresh' content='1;>";
    }
    echo "<script>alert('Data Nasabah Berhasil Diupdate!')</script>";
    echo "<meta content='0; url=index.php' http-equiv='refresh'>";
  }

  public function deleteNasabah($id) {
    $deleteNasabah = $this->runQuery("DELETE FROM nasabah WHERE id_nasabah='$id'");

    if (!$deleteNasabah) {
      echo "<script>alert('Data Nasabah Gagal Dihapus!')</script>";
      echo "<meta content='0; url=index.php' http-equiv='refresh'>";
    } else {
      echo "<script>alert('Data Nasabah Berhasil Dihapus!')</script>";
      echo "<meta content='0; url=index.php' http-equiv='refresh'>";
    }
  }
}
