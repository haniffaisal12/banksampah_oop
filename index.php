<?php
session_start();
ob_start();

if (empty($_SESSION['username']) or empty($_SESSION['password'])) {
  echo "<script>alert('Login Gagal ! Anda harus login terlebih dahulu')</script>";
  echo "<meta http-equiv='refresh' content='2; url=login.php'>";
}

require 'init.php';
include 'fragment/header.php';
include 'fragment/sidebar.php';
?>

<div class="jumbotron mt-3">
  <h1>Selamat Datang di</h1>
  <h1 class="display-4"><i class="oi oi-home"></i> Aplikasi Pengelolaan Bank Sampah</h1>
  <h3>Anda Login Sebagai Petugas</h3>
</div>

<?php
$jml = new Database();
$jml_nasabah = $jml->hitungJumlah("SELECT * FROM nasabah");
$jml_petugas = $jml->hitungJumlah("SELECT * FROM petugas");
$jml_sampah = $jml->hitungJumlah("SELECT * FROM sampah");
$jml_tabungan = $jml->hitungJumlah("SELECT * FROM tabungan");
?>

<div class="row mb-3 pb-3">
  <div class="col-sm-6 mb-3">
    <ul class="list-group">
      <li class="list-group-item text-danger">
        <i class="oi oi-people display-3"></i>
        <span class="display-3 float-right">
          <?= $jml_nasabah ?>
        </span>
      </li>
      <li class="list-group-item bg-danger">
        <a href="<?= 'http://' . $_SERVER['SERVER_NAME'] . '/banksampah_oop/content/nasabah/' ?>" class="nav-link text-white">Nasabah</a>
      </li>
    </ul>
  </div>

  <div class="col-sm-6 mb-3">
    <ul class="list-group">
      <li class="list-group-item text-success">
        <i class="oi oi-person display-3"></i>
        <span class="display-3 float-right">
          <?= $jml_petugas ?>
        </span>
      </li>
      <li class="list-group-item bg-success">
        <a href="<?= 'http://' . $_SERVER['SERVER_NAME'] . '/banksampah_oop/content/petugas/' ?>" class="nav-link text-white">Petugas</a>
      </li>
    </ul>
  </div>

  <div class="col-sm-6 mb-3">
    <ul class="list-group">
      <li class="list-group-item text-secondary">
        <i class="oi oi-trash display-3"></i>
        <span class="display-3 float-right">
          <?= $jml_sampah ?>
        </span>
      </li>
      <li class="list-group-item bg-secondary">
        <a href="<?= 'http://' . $_SERVER['SERVER_NAME'] . '/banksampah_oop/content/sampah/' ?>" class="nav-link text-white">Sampah</a>
      </li>
    </ul>
  </div>

  <div class="col-sm-6 mb-3">
    <ul class="list-group">
      <li class="list-group-item text-info">
        <i class="oi oi-credit-card display-3"></i>
        <span class="display-3 float-right">
          <?= $jml_tabungan ?>
        </span>
      </li>
      <li class="list-group-item bg-info">
        <a href="<?= 'http://' . $_SERVER['SERVER_NAME'] . '/banksampah_oop/content/tabungan/' ?>" class="nav-link text-white">Tabungan</a>
      </li>
    </ul>
  </div>
</div>

<?php
include 'fragment/footer.php';
?>
