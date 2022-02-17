<?php
require_once '../../init.php';
include '../../fragment/header.php';
include '../../fragment/sidebar.php';
?>

<h2 class="judul">Data Petugas</h2>

<div class="table-responsive mt-3">
  <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th>NO</th>
        <th>ID PETUGAS</th>
        <th>NAMA</th>
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
