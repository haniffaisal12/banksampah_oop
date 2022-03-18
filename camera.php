<?= $this->extend('/layout/page_layout'); ?>
<?= $this->section('style'); ?>
<style>
  .cursor-text {
    cursor: text;
  }

  #start-camera {
    margin-top: 50px;
  }

  #video {
    display: none;
    margin: 0 auto 25px auto;
  }

  #click-photo {
    display: none;
  }

  #dataurl-container {
    display: none;
  }

  #canvas {
    display: block;
    margin: 25px auto 0 auto;
  }

  #dataurl-header {
    text-align: center;
    font-size: 15px;
  }

  #dataurl {
    display: block;
    height: 100px;
    width: 320px;
    margin: 10px auto;
    resize: none;
    outline: none;
    border: 1px solid #111111;
    padding: 5px;
    font-size: 13px;
    box-sizing: border-box;
  }
</style>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>

<div class="container mt-5 py-5" id="main">
  <!-- page title -->
  <div class="row mb-2">
    <h2><?= $title; ?></h2>
  </div>

  <div class="row" id="absenModal">
    <form action="/barcode/scan" method="POST" id="formAbsen" name="formAbsen" enctype="multipart/form-data">
      <?= csrf_field(); ?>
      <input type="hidden" name="id_workplace" id="formAbsenWorkplace" value="<?= $loginUser['id_workplace']; ?>">

      <div class="row">
        <div class="col-sm-4 mb-4">
          <div class="form-outline">
            <input type="text" name="tanggal" class="form-control" id="formAbsenTglAbsen" autocomplete="off" value="<?= date('Y-m-d'); ?>" readonly required />
            <label for="formAbsenTglAbsen" class="form-label">Tgl Absen</label>
          </div>
        </div>

        <div class="col-sm-4 mb-4">
          <div class="form">
            <select name="kehadiran" class="select" id="formAbsenKehadiran" data-mdb-placeholder="Pilih kehadiran" required>
              <option value="" selected disabled>Pilih kehadiran</option>
              <option value="hadir">Hadir</option>
              <option value="dinas">Dinas</option>
              <option value="lembur_libur" id="selectLemburLibur" disabled>Lembur khusus</option>
              <option value="sakit">Sakit</option>
              <option value="izin">Izin</option>
              <!-- <option value="cuti">Cuti</option> -->
              <option value="alpha">Alpha</option>
            </select>
            <label class="form-label select-label">Kehadiran</label>
          </div>
        </div>

        <div class="col-sm-4 mb-4">
          <div class="form">
            <select name="type" class="select" id="formAbsenType" data-mdb-placeholder="Pilih absen" disabled required>
              <option value="" selected disabled>Pilih absen</option>
              <option value="absen_masuk">Absen masuk</option>
              <option value="absen_pulang">Absen pulang</option>
            </select>
            <label class="form-label select-label">Absen</label>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-8 mb-4">
          <div class="form">
            <select name="pin" class="select" id="formAbsenKaryawan" data-mdb-container="#absenModal" data-mdb-filter="true" data-mdb-placeholder="Pilih karyawan" disabled required></select>
            <label class="form-label select-label">Karyawan</label>
          </div>
        </div>

        <div class="col-sm-4 mb-4">
          <div class="form-outline">
            <input type="time" name="jam_absen" class="form-control" id="formAbsenJam" data-mdb-toggle="timepicker" autocomplete="off" readonly required />
            <label class="form-label" for="formAbsenJam">Jam Absen</label>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-4 mb-4"></div>
        <div class="col-sm-4 mb-4">
          <center>
            <button class="width: 120px; padding: 10px; display: block; margin: 30px auto; cursor: pointer; btn btn-primary" id="start-camera">Start Camera</button>
            <video id="video" width="320" height="240" autoplay></video>
            <button class="width: 120px; padding: 10px; display: block; margin: 30px auto; cursor: pointer; btn btn-success" id="click-photo"><i class="fas fa-search-location"></i> Get Location</button>
            <div id="dataurl-container">
              <canvas id="canvas" width="320" height="240"></canvas>
              <div id="dataurl-header">Image Data URL</div>
              <textarea id="dataurl" readonly></textarea>
            </div>
          </center>
        </div>
        <div class="col-sm-4 mb-4"></div>

      </div>

      <div class="row">
        <div class="col-sm-6 mb-4">
          <div class="form-outline">
            <input type="text" name="lat" class="form-control" id="formAbsenLat" readonly required />
            <label class="form-label" for="formAbsenLat">Latitude</label>
          </div>
        </div>

        <div class="col-sm-6 mb-4">
          <div class="form-outline">
            <input type="text" name="lang" class="form-control" id="formAbsenLang" readonly required />
            <label class="form-label" for="formAbsenLang">Longtitude</label>
          </div>
        </div>
      </div>

    </form>
    <div class="modal-footer">
      <button type="submit" form="formAbsen" class="btn btn-sm shadow-0" id="formAbsenFileSumbit"><i class="fas fa-save fa-2x"></i></button>
    </div>
  </div>
</div>


<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script type="module" src="<?= base_url() ?>/src/script/geolocation/geolocation.js"></script>
<script src="<?= base_url() ?>/src/script/geolocation/getlocation.js"></script>
<?= $this->endSection(); ?>
