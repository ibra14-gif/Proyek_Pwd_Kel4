<?php
require_once 'koneksi.php';

if (isAdmin()) {
    header("Location: index.php");
    exit;
}

// Ambil semua dokter
$dokter = $conn->query("SELECT * FROM dokter ORDER BY id_dokter");

// Ambil dokter yang dipilih
$id_dokter = isset($_GET['id
// Ambil dokter yang dipilih
$id_dokter = isset($_GET['id_dokter']) ? (int)$_GET['id_dokter'] : 0;

// Ambil jadwal berdasarkan dokter
$jadwal = [];
if ($id_dokter > 0) {
    $result = $conn->query("SELECT * FROM jadwal WHERE id_dokter = $id_dokter AND kuota > 0");
    while ($row = $result->fetch_assoc()) {
        $jadwal[] = $row;
    }
}
?>
<?php include 'header-pasien.php'; ?>

<section class="page-hero">
  <div class="container">
    <div class="section-label text-center" style="color:var(--gold-300);">Buat Janji Temu</div>
        <h1 class="text-center mb-2">Form Reservasi</h1>
        <p class="text-center mb-0">Isi data Anda dengan lengkap dan benar</p>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <h4 class="mb-1" style="font-family:var(--font-display);color:var(--teal-900);">
          <i class="bi bi-person-fill-add me-2 text-teal"></i>Data Pasien & Janji Temu
      </h4>
      <p class="text-muted small mb-4">Tanda <span class="text-danger">*</span> wajib diisi</p>
       <!-- FORM PILIH DOKTER (GET) -->

      <form method="GET">
        <div class="mb-4">
          <label class="form-label">Pilih Dokter <span class="required">*</span></label>
          <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
              <select class="form-select" name="id_dokter" id="selectDokter" required onchange="this.form.submit()">
                  <option value="">— Pilih Dokter —</option>
                  <?php while ($d = $dokter->fetch_assoc()): ?>
                  <option value="<?= $d['id_dokter'] ?>" <?= ($id_dokter == $d['id_dokter']) ? 'selected' : '' ?>>
                      <?= htmlspecialchars($d['nama_dokter']) ?> — <?= htmlspecialchars($d['spesialis']) ?>
                  </option>
                  <?php endwhile; ?>
              </select>
          </div>
        </div>
      </form>

      <hr>

      <!-- FORM RESERVASI (POST) -->
      <form action="landing.php" method="POST" id="reservasiForm">

          <input type="hidden" name="id_dokter" value="<?= $id_dokter ?>">

          <!-- Jadwal -->
          <div class="mb-4">
              <label class="form-label">Hari & Jadwal Temu <span class="required">*</span></label>
              <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-calendar-week"></i></span>
                  <select class="form-select" name="id_jadwal" id="selectJadwal" required>
                      <option value="">— Pilih jadwal —</option>
                      <?php foreach ($jadwal as $j): ?>
                        <option value="<?= $j['id_jadwal'] ?>">
                            <?= $j['hari'] ?> (<?= $j['jam_mulai'] ?> - <?= $j['jam_selesai'] ?>) | Kuota: <?= $j['kuota'] ?>
                        </option>
                      <?php endforeach; ?>
                  </select>
              </div>
              <div id="jadwalInfo" class="form-text text-teal" style="display:none;">
                  <i class="bi bi-info-circle me-1"></i><span id="jadwalInfoText"></span>
              </div>
          </div>

          <!-- Nama -->
          <div class="mb-4">
              <label class="form-label">Nama Lengkap <span class="required">*</span></label>
              <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-person"></i></span>
                  <input type="text" class="form-control" name="nama_pasien"
                      placeholder="Masukkan nama lengkap Anda"
                      required minlength="3">
              </div>
          </div>

          <!-- No HP -->
          <div class="mb-4">
              <label class="form-label">Nomor HP / WhatsApp <span class="required">*</span></label>
              <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-phone"></i></span>
                  <input type="tel" class="form-control" name="no_hp"
                      placeholder="Contoh: 08123456789"
                      required pattern="[0-9]{10,15}">
              </div>
              <div class="form-text">Format: angka saja, 10–15 digit</div>
          </div>

          <!-- Tanggal -->
          <div class="mb-4">
              <label class="form-label">Tanggal Kunjungan <span class="required">*</span></label>
              <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                  <input type="date" class="form-control" name="tanggal" id="inputTanggal"
                      min="<?= date('Y-m-d') ?>" required>
              </div>
              <div class="form-text" id="tanggalHint">Pilih dokter dan jadwal terlebih dahulu</div>
          </div>

          <!-- Keluhan -->
          <div class="mb-4">
              <label class="form-label">Keluhan / Keterangan <span class="required">*</span></label>
              <textarea class="form-control" name="keluhan" rows="4"
                  placeholder="Ceritakan keluhan atau gejala yang Anda rasakan..."
                  required minlength="10"></textarea>
          </div>

          <br><br>
          <div class="d-grid">
              <button type="submit" class="btn btn-gold btn-lg">
                  <i class="bi bi-calendar-check me-2"></i>Konfirmasi Reservasi
              </button>
          </div>
      </form>
    </div>
  </div>
</section>

