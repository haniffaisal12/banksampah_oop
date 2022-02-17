<?php

require_once '../../init.php';
include '../../fragment/header.php';
include '../../fragment/sidebar.php';
?>
<html>
<h2 class="judul">Data Sampah</h2>
<a class="tombol" href="add.php"><i class="oi oi-plus"></i> Tambah</a>

<div class="table-responsive mt-3">
  <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th>NO</th>
        <th>NO BARANG</th>
        <th>NAMA BARANG</th>
        <th>HARGA</th>
        <th>AKSI</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sampah = new Sampah();
      $sampahs = $sampah->getAllSampah();
      $no = 0;
      foreach ($sampahs as $data) {
        $no++;
      ?>
        <tr>
          <td align="center"><?= $no ?></td>
          <td align="center"><?= $data['kd_barang'] ?></td>
          <td align="center"><?= $data['nama_barang'] ?></td>
          <td align="center">Rp. <?= $data['harga'] ?></td>
          <td>
            <a class="tombol edit" href="upd.php?kd=<?= $data['kd_barang'] ?>"><i class="oi oi-pencil"></i> Edit </a>
            <a class="tombol hapus" href="del.php?kd=<?= $data['kd_barang'] ?>"><i class="oi oi-x"></i> Hapus </a>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>

<?php
include '../../fragment/footer.php';
?>
