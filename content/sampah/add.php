<?php
require_once '../../init.php';
include '../../fragment/header.php';
include '../../fragment/sidebar.php';
?>

<h2 class="judul">Tambah Sampah</h2>
<form method="post" action="">

  <div class="form-group">
    <label for="kdbarang">Kode Barang</label>
    <div class="input"><input type="text" id="kdbarang" name="kdbarang"></div>
  </div>

  <div class="form-group">
    <label for="namabarang">Nama Barang</label>
    <div class="input"><input type="text" id="namabarang" name="namabarang"></div>
  </div>

  <div class="form-group">
    <label for="harga">Harga</label>
    <div class="input"><input type="text" id="harga" name="harga"></div>
  </div>

  <div class="form-group">
    <input type="submit" value="Simpan" name="simpan" class="tombol simpan">
    <input type="reset" value="Batal" name="batal" class="tombol reset">
  </div>
</form>

<?php
if (isset($_POST['simpan'])) {
  $kdbarang = $_POST["kdbarang"];
  $namabarang = $_POST["namabarang"];
  $harga = $_POST["harga"];

  $sampah = new Sampah();
  $sampah->addSampah($kdbarang, $namabarang, $harga);
}
include '../../fragment/footer.php';
?>
