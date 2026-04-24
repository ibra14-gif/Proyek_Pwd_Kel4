<?php
require_once 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login-admin.php");
    exit;
}

$pageTitle = 'Dashboard';

    $total_reservasi = $conn->query("SELECT COUNT(*) as c FROM reservasi")->fetch_assoc()['c'];
    $today_count     = $conn->query("SELECT COUNT(*) as c FROM reservasi WHERE tanggal = CURDATE()")->fetch_assoc()['c'];
    $week_count      = $conn->query("SELECT COUNT(*) as c FROM reservasi WHERE WEEK(tanggal) = WEEK(CURDATE())")->fetch_assoc()['c'];
    $total_dokter    = $conn->query("SELECT COUNT(*) as c FROM dokter")->fetch_assoc()['c'];
    $recent = $conn->query("SELECT r.*, d.nama_dokter, d.spesialis, j.hari, j.jam_mulai FROM reservasi r JOIN dokter d ON r.id_dokter = d.id_dokter JOIN jadwal j ON r.id_jadwal = j.id_jadwal ORDER BY r.id_reservasi DESC LIMIT 8");
    $today_res = $conn->query("SELECT r.*, d.nama_dokter, j.hari, j.jam_mulai, j.jam_selesai FROM reservasi r JOIN dokter d ON r.id_dokter = d.id_dokter JOIN jadwal j ON r.id_jadwal = j.id_jadwal WHERE r.tanggal = CURDATE() ORDER BY j.jam_mulai ASC");
    $per_dokter = $conn->query("SELECT d.nama_dokter, d.spesialis, COUNT(r.id_reservasi) as total FROM dokter d LEFT JOIN reservasi r ON d.id_dokter = r.id_dokter GROUP BY d.id_dokter ORDER BY total DESC");

?>
<?php include 'header-admin.php'; ?>

<section class="page-hero" style="padding:40px 0 30px;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <div class="section-label" style="color:var(--gold-300);">Panel Admin</div>
                <h1 class="mb-1">Dashboard</h1>
                <p class="text-white-50 mb-0 small">Selamat datang, <strong class="text-white"><?= htmlspecialchars($_SESSION['username'] ?? 'Admin') ?></strong> — <?= date('d F Y') ?></p>
            </div>
            <div class="d-flex gap-2 flex-wrap">
                <a href="biografi-admin.php" class="btn btn-outline-light btn-sm"><i class="bi bi-people me-1"></i>Lihat Dokter</a>
                <a href="reservasi-admin.php" class="btn btn-gold btn-sm"><i class="bi bi-calendar-check me-1"></i>Semua Reservasi</a>
            </div>
        </div>
    </div>
</section>

<section class="py-4">
    <div class="container">
        <div class="row g-3 mb-4">
            <?php
            $stats = [
                ['val'=>$total_reservasi,'label'=>'Total Reservasi','icon'=>'bi-calendar-check','cls'=>'icon-teal'],
                ['val'=>$today_count,'label'=>'Reservasi Hari Ini','icon'=>'bi-calendar-day','cls'=>'icon-gold'],
                ['val'=>$week_count,'label'=>'Minggu Ini','icon'=>'bi-calendar-week','cls'=>'icon-teal'],
                ['val'=>$total_dokter,'label'=>'Dokter Aktif','icon'=>'bi-people','cls'=>'icon-gold'],
            ];
            foreach ($stats as $s): ?>
            <div class="col-lg-3 col-md-6">
                <div class="feature-card d-flex align-items-center gap-3 py-3">
                    <div class="feature-icon <?= $s['cls'] ?> mb-0 flex-shrink-0"><i class="bi <?= $s['icon'] ?>"></i></div>
                    <div>
                        <div class="stat-number" style="font-size:28px;"><?= $s['val'] ?></div>
                        <div class="small text-muted"><?= $s['label'] ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
</section>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Klink Sehat</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    <style>
      .custom-navbar {
        background-color: rgb(108, 217, 175);
      }

      .col-lg-6 h1 {
        color: rgb(108, 217, 175);
      }

      .hero-bg {
        background-image: linear-gradient(
      rgba(100, 100, 100, 0.7), 
      rgba(100, 100, 100, 0.7)
    ), url("assets/Baground-Index.png");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
        display: flex;

      }
    </style>
  </head>
  <body>

    <div class="hero-bg">
    <div class="container col-xxl-8 px-4 py-5">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
          <img
            src="assets/orang.png"
            class="d-block mx-lg-auto img-fluid"
            alt="Bootstrap Themes"
            width="300"
            height="600"
            loading="lazy"
          />
        </div>

        <div class="col-lg-6">
          <h1 class="display-5 fw-bold lh-1 mb-3">
            Brifa <br> Medika
          </h1>

          <p class="lead fw-bold" style="color: rgb(36, 23, 217)">
            Melayani dengan Sepenuh Hati.
          </p>

          <p class="lead">
            Klinik Brifa Medika hadir dengan tim dokter spesialis berpengalaman dan fasilitas modern untuk memberikan layanan kesehatan terbaik bagi Anda dan keluarga.
          </p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">
              <a class="text-white text-decoration-none" href="reservasi-admin.php">Lihat Reservasi</a>
            </button>

          </div>
        </div>
      </div>
    </div>
    </div>

    <?php include 'footer.php'; ?>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
  </body>
</html>