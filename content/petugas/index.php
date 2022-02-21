<?php
require_once '../../init.php';
include '../../fragment/header.php';
include '../../fragment/sidebar.php';
?>

<h2 class="judul">Data Petugas</h2>
<a class="tombol" href="add.php"><i class="oi oi-plus"></i> Tambah</a>

<div class="table-responsive mt-3">
  <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th>NO</th>
        <th>ID PETUGAS</th>
        <th>NAMA</th>
        <th>JABATAN</th>
        <th>GAJI</th>
        <th>AKSI</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $petugas = new Petugas();
      $allPetugas = $petugas->getAllPetugas();
      $no = 0;
      foreach ($allPetugas as $data) {
        $no++;
      ?>
        <tr>
          <td align="center"><?= $no ?></td>
          <td align="center"><?= $data['id_petugas'] ?></td>
          <td align="center"><?= $data['nama_petugas'] ?></td>
          <td align="center"><?= $data['jabatan'] ?></td>
          <td align="center"><?= $data['gaji'] ?></td>
          <td>
            <a class="tombol edit" href="upd.php?id=<?= $data['id_petugas'] ?>"><i class="oi oi-pencil"></i> Edit </a>
            <a class="tombol hapus" href="del.php?id=<?= $data['id_petugas'] ?>"><i class="oi oi-x"></i> Hapus </a>
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
