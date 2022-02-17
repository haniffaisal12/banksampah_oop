<?php
require_once '../../init.php';
include '../../fragment/header.php';
include '../../fragment/sidebar.php';
?>

<h2 class="judul">Tambah Nasabah</h2>
<form method="POST" action="">

  <div class="form-group">
    <label for="idnasabah">ID Nasabah</label>
    <div class="input"><input type="text" id="idnasabah" name="idnasabah"></div>
  </div>

  <div class="form-group">
    <label for="namanasabah">Nama Nasabah</label>
    <div class="input"><input type="text" id="namanasabah" name="namanasabah"></div>
  </div>

  <div class="form-group">
    <label for="alamat">Alamat</label>
    <div class="input"><input type="text" id="alamat" name="alamat"></div>
  </div>

  <div class="form-group">
    <label for="notelepon">No Telepon</label>
    <div class="input"><input type="text" id="notelepon" name="notelepon"></div>
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

  $nasabah = new Nasabah();
  $nasabah->addNasabah($id, $nama, $alamat, $no_telepon);
}
include '../../fragment/footer.php';
?>
