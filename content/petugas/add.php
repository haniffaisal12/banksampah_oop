<?php
require_once '../../init.php';
include '../../fragment/header.php';
include '../../fragment/sidebar.php';

?>

<h2>Tambah Petugas</h2>
<form method="post" action="">
  <div class="form-group">
    <label for="idpetugas">ID Petugas</label>
    <div class="input"><input type="text" id="idpetugas" name="idpetugas"></div>
  </div>

  <div class="form-group">
    <label for="namapetugas">Nama Petugas</label>
    <div class="input"><input type="text" id="namapetugas" name="namapetugas"></div>
  </div>

  <div class="form-group">
    <label for="username">Username</label>
    <div class="input"><input type="text" id="username" name="username"></div>
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <div class="input"><input type="password" id="password" name="password"></div>
  </div>

  <div class="form-group">
    <label for="jabatan">Jabatan</label>
    <div class="input">
      <select id="jabatan" name="jabatan">
        <option value=""> -Pilih Jabatan- </option>
        <option value="staff"> Staff </option>
        <option value="sekretaris"> Sekretaris </option>
        <option value="bendahara"> Bendahara </option>
        <option value="manajer"> Manajer </option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <input type="submit" value="Simpan" name="simpan" class="tombol simpan">
    <input type="reset" value="Batal" name="batal" class="tombol reset">
  </div>
</form>

<?php
if (isset($_POST['simpan'])) {
  $id = $_POST["idpetugas"];
  $nama = $_POST["namapetugas"];
  $username = $_POST["username"];
  $password = md5($_POST['password']);
  $jabatan = $_POST["jabatan"];

  if ($jabatan == 'manajer') {
    $manajer = new Manajer();
    $manajer->addPetugas($id, $nama, $username, $password, $jabatan);
  } elseif ($jabatan == 'sekretaris') {
    $sekretaris = new Sekretaris();
    $sekretaris->addPetugas($id, $nama, $username, $password, $jabatan);
  } elseif ($jabatan == 'bendahara') {
    $bendahara = new Bendahara();
    $bendahara->addPetugas($id, $nama, $username, $password, $jabatan);
  } else {
    $petugas = new Petugas();
    $petugas->addPetugas($id, $nama, $username, $password, $jabatan);
  }
}
include '../../fragment/footer.php';
?>
