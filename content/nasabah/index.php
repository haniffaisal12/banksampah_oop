<?php
require_once '../../init.php';
include '../../fragment/header.php';
include '../../fragment/sidebar.php';
?>

<h2 class="judul">Data Nasabah</h2>
<a class="tombol" href="add.php"><i class="oi oi-plus"></i> Tambah</a>

<div class="table-responsive mt-3">
  <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th>NO</th>
        <th>ID NASABAH</th>
        <th>NAMA</th>
        <th>ALAMAT</th>
        <th>NO TELEPON</th>
        <th>SALDO</th>
        <th>AKSI</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $nasabah = new Nasabah();
      $allNasabah = $nasabah->getAllNasabah();
      $no = 0;
      foreach ($allNasabah as $data) {
        $no++;
      ?>
        <tr>
          <td align="center"><?= $no ?></td>
          <td align="center"><?= $data['id_nasabah'] ?></td>
          <td width="15%" align="center"><?= $data['nama_nasabah'] ?></td>
          <td width="25%" align="center"><?= $data['alamat'] ?></td>
          <td align="center"><?= $data['no_telp'] ?></td>
          <td align="center">Rp. <?= $data['saldo'] ?></td>
          <td>
            <a class="tombol edit" href="upd.php?id=<?= $data['id_nasabah'] ?>"><i class="oi oi-pencil"></i> Edit </a>
            <a class="tombol hapus" href="del.php?id=<?= $data['id_nasabah'] ?>"><i class="oi oi-x"></i> Hapus </a>
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
