<?php
require_once '../../init.php';
include '../../fragment/header.php';
include '../../fragment/sidebar.php';

$getId = $_GET['id'];
$nasabah = new Nasabah();
$data = $nasabah->getNasabahById($getId);
?>

<h2>Edit Nasabah</h2>
<form method="post" action="">
  <div class="form-group">
    <label for="idnasabah">ID Nasabah</label>
    <div class="input"><input type="text" id="idnasabah" name="idnasabah" value="<?= $data['id_nasabah'] ?>"></div>
  </div>

  <div class="form-group">
    <label for="namanasabah">Nama Nasabah</label>
    <div class="input"><input type="text" id="namanasabah" name="namanasabah" value="<?= $data['nama_nasabah'] ?>"></div>
  </div>

  <div class="form-group">
    <label for="alamat">Alamat</label>
    <div class="input"><input type="text" id="alamat" name="alamat" value="<?= $data['alamat'] ?>"></div>
  </div>

  <div class="form-group">
    <label for="notelepon">No Telepon</label>
    <div class="input"><input type="text" id="notelepon" name="notelepon" value="<?= $data['no_telp'] ?>"></div>
  </div>

  <div class="form-group">
    <label for="saldo">Saldo</label>
    <div class="input"><input type="number" id="saldo" name="saldo" value="<?= $data['saldo'] ?>"></div>
  </div>

  <div class="form-group">
    <input type="submit" value="Simpan" name="simpan" class="tombol simpan">
    <input type="reset" value="Batal" name="batal" class="tombol reset">
  </div>
</form>

<?php
if (isset($_POST['simpan'])) {
  $id = $_POST["idnasabah"];
  $nama = $_POST["namanasabah"];
  $alamat = $_POST["alamat"];
  $no_telepon = $_POST["notelepon"];
  $saldo = $_POST["saldo"];

  $nasabah = new Nasabah();
  $nasabah->updateNasabah($getId, $id, $nama, $alamat, $no_telepon, $saldo);
}
include '../../fragment/footer.php';
?>
